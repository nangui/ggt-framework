<?php
/**
 * Smarty Internal Plugin CompileBase.
 *
 * @author     Uwe Tews
 */

/**
 * This class does extend all internal compile plugins.
 */
abstract class Smarty_Internal_CompileBase
{
    /**
     * Array of names of required attribute required by tag.
     *
     * @var array
     */
    public $required_attributes = [];

    /**
     * Array of names of optional attribute required by tag
     * use array('_any') if there is no restriction of attributes names.
     *
     * @var array
     */
    public $optional_attributes = [];

    /**
     * Shorttag attribute order defined by its names.
     *
     * @var array
     */
    public $shorttag_order = [];

    /**
     * Array of names of valid option flags.
     *
     * @var array
     */
    public $option_flags = ['nocache'];

    /**
     * Mapping array for boolean option value.
     *
     * @var array
     */
    public $optionMap = [1 => true, 0 => false, 'true' => true, 'false' => false];

    /**
     * Mapping array with attributes as key.
     *
     * @var array
     */
    public $mapCache = [];

    /**
     * This function checks if the attributes passed are valid
     * The attributes passed for the tag to compile are checked against the list of required and
     * optional attributes. Required attributes must be present. Optional attributes are check against
     * the corresponding list. The keyword '_any' specifies that any attribute will be accepted
     * as valid.
     *
     * @param object $compiler   compiler object
     * @param array  $attributes attributes applied to the tag
     *
     * @return array of mapped attributes for further processing
     */
    public function getAttributes($compiler, $attributes)
    {
        $_indexed_attr = [];
        if (!isset($this->mapCache['option'])) {
            $this->mapCache['option'] = array_fill_keys($this->option_flags, true);
        }
        foreach ($attributes as $key => $mixed) {
            // shorthand ?
            if (!is_array($mixed)) {
                // option flag ?
                if (isset($this->mapCache['option'][trim($mixed, '\'"')])) {
                    $_indexed_attr[trim($mixed, '\'"')] = true;
                // shorthand attribute ?
                } elseif (isset($this->shorttag_order[$key])) {
                    $_indexed_attr[$this->shorttag_order[$key]] = $mixed;
                } else {
                    // too many shorthands
                    $compiler->trigger_template_error('too many shorthand attributes', null, true);
                }
                // named attribute
            } else {
                foreach ($mixed as $k => $v) {
                    // option flag?
                    if (isset($this->mapCache['option'][$k])) {
                        if (is_bool($v)) {
                            $_indexed_attr[$k] = $v;
                        } else {
                            if (is_string($v)) {
                                $v = trim($v, '\'" ');
                            }
                            if (isset($this->optionMap[$v])) {
                                $_indexed_attr[$k] = $this->optionMap[$v];
                            } else {
                                $compiler->trigger_template_error("illegal value '".var_export($v, true).
                                                                  "' for option flag '{$k}'", null, true);
                            }
                        }
                        // must be named attribute
                    } else {
                        $_indexed_attr[$k] = $v;
                    }
                }
            }
        }
        // check if all required attributes present
        foreach ($this->required_attributes as $attr) {
            if (!isset($_indexed_attr[$attr])) {
                $compiler->trigger_template_error("missing '{$attr}' attribute", null, true);
            }
        }
        // check for not allowed attributes
        if ($this->optional_attributes !== ['_any']) {
            if (!isset($this->mapCache['all'])) {
                $this->mapCache['all'] =
                    array_fill_keys(array_merge($this->required_attributes, $this->optional_attributes,
                                                $this->option_flags), true);
            }
            foreach ($_indexed_attr as $key => $dummy) {
                if (!isset($this->mapCache['all'][$key]) && $key !== 0) {
                    $compiler->trigger_template_error("unexpected '{$key}' attribute", null, true);
                }
            }
        }
        // default 'false' for all option flags not set
        foreach ($this->option_flags as $flag) {
            if (!isset($_indexed_attr[$flag])) {
                $_indexed_attr[$flag] = false;
            }
        }
        if (isset($_indexed_attr['nocache']) && $_indexed_attr['nocache']) {
            $compiler->tag_nocache = true;
        }

        return $_indexed_attr;
    }

    /**
     * Push opening tag name on stack
     * Optionally additional data can be saved on stack.
     *
     * @param object $compiler compiler object
     * @param string $openTag  the opening tag's name
     * @param mixed  $data     optional data saved
     */
    public function openTag($compiler, $openTag, $data = null)
    {
        array_push($compiler->_tag_stack, [$openTag, $data]);
    }

    /**
     * Pop closing tag
     * Raise an error if this stack-top doesn't match with expected opening tags.
     *
     * @param object       $compiler    compiler object
     * @param array|string $expectedTag the expected opening tag names
     *
     * @return mixed any type the opening tag's name or saved data
     */
    public function closeTag($compiler, $expectedTag)
    {
        if (count($compiler->_tag_stack) > 0) {
            // get stacked info
            list($_openTag, $_data) = array_pop($compiler->_tag_stack);
            // open tag must match with the expected ones
            if (in_array($_openTag, (array) $expectedTag)) {
                if (is_null($_data)) {
                    // return opening tag
                    return $_openTag;
                } else {
                    // return restored data
                    return $_data;
                }
            }
            // wrong nesting of tags
            $compiler->trigger_template_error("unclosed '{$compiler->smarty->left_delimiter}{$_openTag}{$compiler->smarty->right_delimiter}' tag");

            return;
        }
        // wrong nesting of tags
        $compiler->trigger_template_error('unexpected closing tag', null, true);
    }
}
