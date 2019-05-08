{if $get.module eq '404'}

    {include file="{$template}/modules/{$get.module}/{$get.action}.tpl"}

{else}

    {include file="{$template}/common/_header.tpl"}

    {include file="{$template}/modules/{$get.module}/{$get.action}.tpl"}

    {include file="{$template}/common/_footer.tpl"}

{/if}