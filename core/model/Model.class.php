<?php

/**
 * Description of Queries.
 *
 * @author Mohamed DIOUF
 */
require 'Param.class.php';

class Model extends Param
{
    private $dao;
    private $table;

    public function __construct($dao, $table)
    {
        $this->dao = $dao;
        $this->settable($table);
    }

    public function settable($table)
    {
        $this->table = $table;
    }

    /*
     *  QUERIES
     */

    /* Counting all records donnees from a table without activefield */

    public function getCount($track = false)
    {
        $requete = ('SELECT count(id) as nombre_d_enregistrements FROM '.$this->table.' ');

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

        $nombre_d_enregistrements = (isset($lignes->nombre_d_enregistrements)) ? (int) $lignes->nombre_d_enregistrements : 0;

        return $nombre_d_enregistrements;
    }

    /* Counting all records donnees from a table without activefield */

    public function getCountClosure($clause, $track = false)
    {
        $requete = ('SELECT count(id) as nombre_d_enregistrements FROM '.$this->table.' WHERE 1=1 AND '.$clause);

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

        $nombre_d_enregistrements = (isset($lignes->nombre_d_enregistrements)) ? (int) $lignes->nombre_d_enregistrements : 0;

        return $nombre_d_enregistrements;
    }

    public function getFreeCountClosure($champ, $clause, $track = false)
    {
        $requete = ('SELECT count('.$champ.') as nombre_d_enregistrements FROM '.$this->table.' WHERE 1=1 AND '.$clause);

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

        $nombre_d_enregistrements = (isset($lignes->nombre_d_enregistrements)) ? (int) $lignes->nombre_d_enregistrements : 0;

        return $nombre_d_enregistrements;
    }

    /* Getting all actives donnees from table */

    public function getDatas($champ = [], $order_by = 'id', $debut = 0, $limit = '')
    {
        if (is_array($champ) && count($champ) > 0) {
            $limit = ($limit > 0) ? ', '.$limit : '';
            $requete = 'SELECT '.implode(', ', $champ).' FROM '.$this->table.'  ORDER BY '.$order_by.' LIMIT '.$debut.$limit;
            $execution_requete = $this->dao->prepare($requete);
            $execution_requete->execute();

            $donnees = [];
            $i = 0;

            if ($execution_requete->rowCount() > 0) {
                while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                    $donnees[$i] = $lignes;
                    $i++;
                }
            }

            return $donnees;
        }

        return false;
    }

    /* Get all data from table (only get specific fields) */

    public function getDatasNoLimit($champ = [], $order_by = 'id', $clause = '')
    {
        if (is_array($champ) && count($champ) > 0) {
            $requete = 'SELECT '.implode(', ', $champ).' FROM '.$this->table;
            if (!empty($clause)) {
                $requete .= " WHERE $clause ";
            }
            $execution_requete = $this->dao->prepare($requete);
            $execution_requete->execute();

            $donnees = [];
            $i = 0;

            if ($execution_requete->rowCount() > 0) {
                while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                    $donnees[$i] = $lignes;
                    $i++;
                }
            }

            return $donnees;
        }

        return false;
    }

    /*     * Select specific fields in multiple tables with clause where */

    public function getByClosureMultiTables($champ, $clause, $tables = [], $track = false)
    {
        $requete = 'SELECT '.implode(', ', $champ).' FROM  '.$this->table;

        if (count($tables) > 0) {
            foreach ($tables as $key => $value) {
                $requete .= ', '.$value;
            }
        }

        if (!empty($clause)) {
            $requete .= " WHERE $clause ";
        }

        $execution_requete = $this->dao->prepare($requete);

        $execution_requete->execute();
        $donnees = [];
        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount()) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes;
            }
        }

        return $donnees;
    }

    public function getAllDatas($clause = '', $order_by = 'id', $limit = '', $track = false)
    {
        empty($clause) ?
                        $requete = 'SELECT * FROM '.$this->table.' ORDER BY '.$order_by.' '.$limit :
                        $requete = 'SELECT * FROM '.$this->table.' WHERE '.$clause.' ORDER BY '.$order_by.' '.$limit;

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $donnees = [];

        $i = 0;

        if ($execution_requete->rowCount() > 0) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[$i] = $lignes;

                $i++;
            }
        }

        return $donnees;
    }

    public function getById($champ, $id, $clause = '')
    {
        $requete = 'SELECT '.$champ.' FROM '.$this->table.' WHERE id = :id '.$clause;

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['id' => $id]);

        if (false) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }
        $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

        return isset($lignes->$champ) ? $lignes->$champ : '';
    }

    public function getMoreById($id, $champ = [], $track = false)
    {
        $selects = (is_array($champ) && count($champ) > 0) ? implode(', ', $champ) : '*';

        $requete = 'SELECT '.$selects.' FROM '.$this->table.' WHERE id = :id';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['id' => $id]);

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

        return isset($lignes) ? $lignes : false;
    }

    public function getByfk($id_champ_fk, $id_valeur, $track = false)
    {
        $requete = 'SELECT * FROM '.$this->table.' WHERE '.$id_champ_fk.' = :id_valeur ';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['id_valeur' => $id_valeur]);

        $donnees = [];

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount() > 0) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes;
            }
        }

        return $donnees;
    }

    public function getAllById($id, $clause = '', $track = false)
    {
        $requete = 'SELECT * FROM '.$this->table.' WHERE id = :id ';
        $requete .= (!empty($clause)) ? " AND $clause " : $clause;

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['id' => $id]);

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount() > 0) {
            $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

            return $lignes;
        }

        return false;
    }

    public function getIdsByField($champ, $valeur, $track = false)
    {
        $requete = 'SELECT id FROM '.$this->table.' WHERE '.$champ.' = :champ';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['champ' => $valeur]);

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount() > 0) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes->id;
            }
        }

        return (isset($donnees) && count($donnees) > 0) ? $donnees : false;
    }

    public function getIdByField($champ, $valeur, $track = false)
    {
        $requete = 'SELECT id FROM '.$this->table.' WHERE '.$champ.' = :champ LIMIT 1';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['champ' => $valeur]);

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

        return isset($lignes->id) ? intval($lignes->id) : 0;
    }

    public function getIdByArray($champs = [], $track = false)
    {
        $requete = 'SELECT id FROM '.$this->table.' WHERE ';

        if (count($champs) > 0) {
            foreach ($champs as $champ => $valeur) {
                if (!empty($valeur)) {
                    $requete .= $champ.' = :'.$champ.' AND ';
                } else {
                    unset($champs[$champ]);
                }
            }

            $requete = substr($requete, 0, -4).' LIMIT 1';

            $execution_requete = $this->dao->prepare($requete);
            $execution_requete->execute($champs);

            if ($track) {
                var_dump($requete);
                var_dump($execution_requete->errorInfo());
            }

            $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);
        }

        return isset($lignes->id) ? intval($lignes->id) : 0;
    }

    public function recordExists($champs = [], $track = false)
    {
        $requete = 'SELECT id FROM '.$this->table.' WHERE ';

        if (count($champs) > 0) {
            foreach ($champs as $champ => $valeur) {
                if (!empty($valeur)) {
                    $requete .= $champ.' = :'.$champ.' AND ';
                } else {
                    unset($champs[$champ]);
                }
            }

            $requete = substr($requete, 0, -4);

            $execution_requete = $this->dao->prepare($requete);
            $execution_requete->execute($champs);

            if ($track) {
                var_dump($requete);
                var_dump($execution_requete->errorInfo());
            }

            $id = $execution_requete->fetchColumn(0);
        }

        return isset($id) ? intval($id) : 0;
    }

    public function recordExistsFree($tables, $champ = '', $clause = '1 = 1', $track = false)
    {
        $requete = 'SELECT '.$champ.' FROM  '.$tables;
        $requete .= !empty($clause) ? ' WHERE '.$clause : '';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();
        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $resultat = $execution_requete->fetchColumn(0);

        return isset($resultat) ? $resultat : '';
    }

    public function getIdsByArray($champs = [], $clause = ' 1=1 ', $order = 'id', $track = false)
    {
        $requete = 'SELECT id FROM '.$this->table.' WHERE ';

        if (count($champs) > 0) {
            foreach ($champs as $champ => $valeur) {
                if (!empty($valeur)) {
                    $requete .= $champ.' = :'.$champ.' AND ';
                } else {
                    unset($champs[$champ]);
                }
            }
        }

        $requete .= " $clause ORDER BY $order";

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute($champs);

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $donnees = [];

        while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
            $donnees[] = $lignes->id;
        }

        return (isset($donnees) && count($donnees) > 0) ? $donnees : false;
    }

    public function getLastId($track = false)
    {
        $requete = 'SELECT id FROM '.$this->table.' ORDER BY id DESC LIMIT 1';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

        return isset($lignes->id) ? intval($lignes->id) : 0;
    }

    public function getField($champ, $track = false)
    {
        $requete = 'SELECT '.$champ.' FROM '.$this->table.' ORDER BY id DESC';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        $donnees = [];

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount()) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes->$champ;
            }
        }

        return $donnees;
    }

    public function getFields($champs = [], $clause = '1 = 1', $order = 'id DESC', $limit = '', $track = false)
    {
        $selects = (is_array($champs)) ? implode(', ', $champs) : (!empty($champs) ? $champs : '*');

        $requete = "SELECT $selects FROM  ".$this->table." WHERE $clause ORDER BY ";
        $requete .= (empty($order)) ? ' id DESC ' : $order.' ';
        $requete .= (empty($limit)) ? '' : $limit;

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        $donnees = [];

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount()) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes;
            }
        }

        return $donnees;
    }

    public function getFieldsFree($tables, $champs = '', $clause = '1 = 1', $order = ' id DESC', $limit = '', $track = false)
    {
        $selects = !empty($champs) ? $champs : '*';

        $requete = 'SELECT '.$selects.' FROM  '.$tables;
        $requete .= !empty($clause) ? ' WHERE '.$clause : '';
        $requete .= !empty($order) ? ' ORDER BY '.$order : '';
        $requete .= !empty($limit) ? ' '.$limit : '';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        $donnees = [];

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount()) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes;
            }
        }

        return $donnees;
    }

    public function getByClosure($champ, $clause, $track = false)
    {
        $requete = "SELECT $champ FROM  ".$this->table." WHERE $clause ";

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        $donnees = [];

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount()) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes->$champ;
            }
        }

        return $donnees;
    }

    public function getDistinct($champ, $track = false)
    {
        $requete = "SELECT DISTINCT($champ) FROM  ".$this->table.' ORDER BY id DESC';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        $donnees = [];

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount()) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes->$champ;
            }
        }

        return $donnees;
    }

    public function getDistinctClosure($champ, $clause, $track = false)
    {
        $requete = "SELECT DISTINCT($champ) FROM  ".$this->table." WHERE $clause ORDER BY id DESC";

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        $donnees = [];

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        if ($execution_requete->rowCount()) {
            while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) {
                $donnees[] = $lignes->$champ;
            }
        }

        return $donnees;
    }

    public function getExtremum($champ, $extremum = 'max', $clause = '', $track = false)
    {
        $requete = ($extremum === 'min') ? "SELECT MIN($champ) FROM  ".$this->table.' WHERE 1=1 ' : "SELECT MAX($champ) FROM  ".$this->table.' WHERE 1=1 ';

        $requete .= (!empty($clause)) ? 'AND '.$clause : '';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        $max = 0;

        if ($execution_requete->rowCount()) {
            $max = $execution_requete->fetchColumn(0);
        }

        return (int) $max;
    }

    public function deleteByField($champ, $valeur, $track = false)
    {
        $requete = 'DELETE FROM '.$this->table." WHERE $champ = :valeur ";

        $execution_requete = $this->dao->prepare($requete);

        if ($execution_requete->execute(['valeur' => $valeur])) {
            return true;
        }

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        return false;
    }

    public function deleteByClause($clause, $track = false)
    {
        $requete = 'DELETE FROM '.$this->table.' WHERE 1=1 AND ';

        if (empty($clause)) {
            return false;
        }

        $requete .= $clause;

        $execution_requete = $this->dao->prepare($requete);

        if ($execution_requete->execute()) {
            return true;
        }

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        return false;
    }

    public function deleteById($id, $track = false)
    {
        $requete = 'DELETE FROM '.$this->table.' WHERE id = :id ';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['id' => $id]);

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        return true;
    }

    public function deleteByIdIn($id_data = [], $clause = '', $track = false)
    {
        $retour = -1;
        $requete = 'DELETE FROM  '.$this->table.' WHERE id IN ('.implode(', ', $id_data).") $clause ";
        $execution_requete = $this->dao->prepare($requete);
        if ($execution_requete->execute()) {
            $retour = $execution_requete->rowCount();
        }

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        return $retour;
    }

    public function deleteByIdNIn($id_data = [], $clause = '', $track = false)
    {
        $requete = 'DELETE FROM  '.$this->table.' WHERE id NOT IN ('.implode(', ', $id_data).") $clause ";

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        if ($track) {
            var_dump($requete);
            var_dump($execution_requete->errorInfo());
        }

        return true;
    }

    /*
     *  INSERT QUERY & UPDATE QUERY & SAVE
     */

    public function insertOne($donnees = [], $track = false)
    {
        foreach ($donnees as $key => $value) {
            if (empty($value)) {
                $donnees[$key] = null;
            }
        }
        if (count($donnees) > 0) {
            foreach ($donnees as $champ => $valeur) {
                if (empty($valeur)) {
                    unset($donnees[$champ]);
                }
            }
            $requete = 'INSERT INTO '.$this->table.'('.implode(',', array_keys($donnees)).') VALUES(:'.implode(', :', array_keys($donnees)).')';
            $execution_requete = $this->dao->prepare($requete);
            if ($execution_requete->execute($donnees)) {
                if ($track) {
                    var_dump($requete);
                    var_dump($execution_requete->errorInfo());
                }

                return $this->dao->lastInsertId();
            }

            if ($track) {
                var_dump($requete);
                var_dump($execution_requete->errorInfo());
            }
        }

        return -1;
    }

    public function updateOne($donnees = [], $track = false)
    {
        if (count($donnees) > 0) {
            $set = '';

            foreach ($donnees as $champ => $valeur) {
                if (empty($valeur)) {
                    $donnees[$champ] = null;
                }
                if (in_array($champ, ['password', 'mot_de_passe']) && empty($valeur)) {
                    continue;
                }

                $set .= ''.$champ.' = :'.$champ.', ';
            }
            $requete = ('UPDATE '.$this->table.' SET '.substr($set, 0, -2).' WHERE id =:id');
            $execution_requete = $this->dao->prepare($requete);

            if ($execution_requete->execute($donnees)) {
                return $donnees['id'];
            }

            if ($track) {
                var_dump($execution_requete->errorInfo());
                var_dump($requete);
            }
        }

        return -1;
    }

    public function updateWithFreeClause($donnees = [], $clause = '', $track = false)
    {
        if (count($donnees) > 0) {
            $set = '';

            foreach ($donnees as $champ => $valeur) {
                if (in_array($champ, ['password', 'mot_de_passe']) && empty($valeur)) {
                    continue;
                }

                $set .= ''.$champ.' = :'.$champ.', ';
            }

            $requete = ('UPDATE '.$this->table.' SET '.substr($set, 0, -2).' WHERE '.$clause);
            $execution_requete = $this->dao->prepare($requete);

            if ($execution_requete->execute($donnees)) {
                if ($track) {
                    var_dump($execution_requete->errorInfo());
                    var_dump($requete);
                }

                return $execution_requete->rowCount();
            }

            if ($track) {
                var_dump($execution_requete->errorInfo());
                var_dump($requete);
            }
        }

        return -1;
    }

    public function deleteWithFreeClause($tableau = [], $track = false)
    {
        if (count($tableau) > 0) {
            $retour = 0;
            $tableau_requete = [];
            foreach ($tableau as $key => $value) {
                $requete = 'DELETE FROM  '.$key.' WHERE '.$value;
                $execution_requete = $this->dao->prepare($requete);
                if ($execution_requete->execute()) {
                    $retour += $execution_requete->rowCount();
                }
                if ($track) {
                    $tableau_requete[] = $requete;
                }
            }
            if ($track) {
                var_dump($tableau_requete);
                var_dump($execution_requete->errorInfo());
            }

            return $retour;
        }

        return -1;
    }

    public function record($donnees, $obligatoires = [], $clause = [])
    {
        $serialise = $this->filter($donnees, $obligatoires);

        if ($serialise->etat) {
            $id_existe = $this->recordExists($clause);

            if ($this->isEmpty($clause) === false && $id_existe > 0) {
                if (!isset($serialise->donnees['id']) || ($id_existe != $serialise->donnees['id'])) {
                    return -2; // Cette information existe déjà.
                }
            }
            $id_record = (isset($serialise->donnees['id'])) ? $this->updateOne($serialise->donnees) : $this->insertOne($serialise->donnees);

            if ($id_record > 0) {
                return $id_record;
            }
        }

        return -3; //$serialise->donnees; // On renvoie les champs obligatoires qui n'ont pas été définis.
    }

    /* To connect */

    public function login($champs)
    {
        $id = $this->getIdByArray($champs);

        if ($id > 0) {
            $_SESSION[_USER_] = $this->getAllById($id);

            return true;
        }

        return false;
    }

    /*
     *  Password reset
     */

    public function checkUserResetPassword($id_agence, $date, $reset_etat)
    {
        $requete = 'SELECT id FROM '.$this->prefix.'password_reset WHERE id_agence = :id_agence AND ( :currentdate BETWEEN reset_datetime_creation AND reset_datetime_ending) AND reset_etat = :reset_etat ';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['id_agence' => $id_agence, 'currentdate' => $date, 'reset_etat' => $reset_etat]);

        $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

        return isset($lignes->id) ? $lignes->id : 0;
    }

    public function getResetInformationsByKeychain($clechain = [], $etat = -2)
    {
        foreach ($clechain as $cle => $valeur) {
            $champ = $cle;
        }

        $requete = 'SELECT * FROM '.$this->prefix.'password_reset WHERE '.$champ.' = :'.$champ.'';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute($clechain);

        if ($execution_requete->rowCount() > 0) {
            $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

            if (date('Y-m-d H:i:s') > $lignes->reset_datetime_ending && $lignes->reset_etat == -2) {
                $this->updateOne($this->prefix.'password_reset', ['id' => $lignes->id, 'reset_etat' => -3]);
                $reset_message = _SESSION_RESET_PASSWORD_EXPIRED;
                $reset_etat = false;
            } else {
                $reset_message = ($lignes->reset_etat == $etat) ? _SESSION_RESET_PASSWORD_PENDING : _SESSION_RESET_PASSWORD_EXPIRED;
                $reset_etat = ($lignes->reset_etat == $etat) ? true : false;
            }
        } else {
            $reset_message = _SESSION_RESET_PASSWORD_UNKNOWN_KEYCHAIN;
            $reset_etat = false;
        }

        return ($reset_etat) ? [$reset_etat, $reset_message, $lignes] : [$reset_etat, $reset_message];
    }

    public function activateAccountByKeychain($clechain = [])
    {
        foreach ($clechain as $cle => $valeur) {
            $champ = $cle;
        }

        $requete = 'SELECT * FROM '.$this->table.' WHERE '.$champ.' = :'.$champ.' AND actif = -2';

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute($clechain);

        if ($execution_requete->rowCount() > 0) {
            $lignes = $execution_requete->fetch(PDO::FETCH_OBJ);

            $this->updateOne(['id' => $lignes->id, 'actif' => 1]);

            $activation_message = _ACCOUNT_ACTIVATED;
            $activation_etat = true;
        } else {
            $activation_message = _SESSION_RESET_PASSWORD_UNKNOWN_KEYCHAIN;
            $activation_etat = false;
        }

        return ($activation_etat) ? [$activation_etat, $activation_message, $lignes] : [$activation_etat, $activation_message];
    }

    /* Cette fonction permet de charger un fichier PDF ou WORD issu d'un formulaire.
     *
     * $fichier : array $_FILES
     *
     * $nom_enregistre : String nom du fichier a l'enregistrement.
     *
     * $chemin : chemin du fichier.
     *
     * $ext : permet de définir les extensions qui seront admises.
     *
     *  */

    public function uploadFile($fichier, $nom_enregistre, $chemin, $ext = ['pdf', 'doc', 'docx', 'png', 'jpg'])
    {
        if (isset($fichier['name']) && (!empty($fichier['name']))) {

            // Traitement du nom du fichier.
            $tabExtension = explode('.', addslashes($fichier['name']));

            $extension = count($tabExtension) - 1;

            $nomFichier = $nom_enregistre.'.'.$tabExtension[$extension];

            // nom temporaire sur le serveur:
            $temporary = addslashes($fichier['tmp_name']);

            $tab_extension = is_array($ext) ? $ext : ['pdf', 'doc', 'docx', 'png', 'jpg'];

            // On vérifie l'extention.
            if (in_array(strtolower($tabExtension[$extension]), $tab_extension)) {
                copy($temporary, $chemin.$nomFichier);

                return [$chemin, $nomFichier];
            }

            return [false, 'Error: file extension.'];
        }

        return [false, 'Error: filename empty.'];
    }

    /* Cette fonction permet de charger une image issue d'un formulaire.
     *
     * $fichier : array $_FILES
     *
     * $nom_enregistre : String nom du fichier a l'enregistrement.
     *
     * $chemin : chemin du fichier.
     *
     * $ext : permet de définir les extensions qui seront admises.
     *
     *  */

    public function uploadPicture2($photo, $nom_enregistre, $chemin, $largeur)
    {

        // Si le nom de la photo n'est pas vide.
        if (isset($photo['name']) && (!empty($photo['name']))) {

            // Traitement du nom de la photo.
            $tabExtensionPhoto = explode('.', addslashes($photo['name']));
            $idExtensionPhoto = count($tabExtensionPhoto) - 1;
            $nomFichier = $nom_enregistre.'.'.strtolower($tabExtensionPhoto[$idExtensionPhoto]);

            $nomFichierOriginal = 'original_'.$nomFichier;

            // nom temporaire sur le serveur:
            $nomTemporaire = addslashes($photo['tmp_name']);

            // On vérifie l'extention.
            if (in_array(strtolower($tabExtensionPhoto[$idExtensionPhoto]), ['jpeg', 'jpg', 'gif', 'png'])) {
                copy($nomTemporaire, $chemin.$nomFichierOriginal);

                //creation de la miniature
                $taille = getimagesize($nomTemporaire);

                $hauteur = ($taille[1] * $largeur) / $taille[0];

                miniature($chemin.$nomFichierOriginal, $nomFichier, $chemin, $largeur, $hauteur);

                unlink($chemin.$nomFichierOriginal);

                return [$chemin, $nomFichier];
            }

            return [false, " Erreur: L'extension du fichier n'est pas bon."];
        }

        return [false, " Erreur: Le nom du fichier n'est pas défini."];
    }

    public function uploadPicture($photo, $nom_enregistre, $chemin, $dimension = [])
    {

        // Si le nom de la photo n'est pas vide.
        if (isset($photo['name']) && (!empty($photo['name']))) {

            // Traitement du nom de la photo.
            $tabExtensionPhoto = explode('.', addslashes($photo['name']));
            $idExtensionPhoto = count($tabExtensionPhoto) - 1;
            $nomFichier = $nom_enregistre.'.'.strtolower($tabExtensionPhoto[$idExtensionPhoto]);

            $nomFichierOriginal = 'original_'.$nomFichier;

            // nom temporaire sur le serveur:
            $nomTemporaire = addslashes($photo['tmp_name']);

            if (filesize($photo['tmp_name']) > _TAILLE_MAX_IMAGE) {
                return [false, " Erreur lors du chargement; la taille de l'image est trop grande. (Lim. ".round(_TAILLE_MAX_IMAGE / 1000000, 0).'Mo)'];
            }
            // On vérifie l'extention.

            if (in_array(strtolower($tabExtensionPhoto[$idExtensionPhoto]), ['jpeg', 'jpg', 'gif', 'png'])) {
                copy($nomTemporaire, $chemin.$nomFichierOriginal);

                //creation de la miniature
                $taille = getimagesize($nomTemporaire);

                $dimension = (!is_array($dimension)) ? [$dimension] : $dimension;

                foreach ($dimension as $cle => $valeur) {
                    if ($cle == 'hauteur') {
                        $hauteur = (int) $valeur[0];
                        $largeur = $taille[0] * ($hauteur / $taille[1]);
                    } elseif ($cle == 'largeur') {
                        $largeur = (int) $valeur[0];
                        $hauteur = $taille[1] * ($largeur / $taille[0]);
                    }
                    miniature($chemin.$nomFichierOriginal, $valeur[1].'--'.$nomFichier, $chemin, $largeur, $hauteur);
                }

                unlink($chemin.$nomFichierOriginal);

                return [true, $nomFichier];
            }

            return [false, " Erreur: L'extension du fichier n'est pas bon."];
        }

        return [false, ''];
    }

    /*
     * AUTOCOMPLETION
     */

    public function autocomplete($champ, $term)
    {
        $requete = ('SELECT id, '.$champ.', code_postal as cp FROM '.$this->table.' WHERE '.$champ.' LIKE :term LIMIT 100');

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute(['term' => '%'.$term.'%']);

        $tableau = []; // on créé le tableau

        while ($lignes = $execution_requete->fetch(PDO::FETCH_OBJ)) { // on effectue une boucle pour obtenir les données
            $tableau[$lignes->id] = $lignes; // et on ajoute celles-ci à notre tableau
        }

        return $tableau; // il n'y a plus qu'à convertir en JSON
        //return json_encode($tableau); // il n'y a plus qu'à convertir en JSON
    }

    /* Traitement tableau */

    public function fillArrays($donnees, $cle, $valeur)
    {
        if (is_array($donnees)) {
            $tableau = [];

            foreach ($donnees as $donnee) {
                if (is_object($donnee)) {
                    $tableau[$donnee->$cle] = $donnee->$valeur;
                }

                if (is_array($donnee)) {
                    $tableau[$donnee[$cle]] = $donnee[$valeur];
                }
            }

            return $tableau;
        }

        return false;
    }

    /*
     *
     * Construction du fichier contant qui va contenir
     * l'ensemble des tables ainsi que leurs champs pour faciliter leur accès
     * depuis le code PHP
     *
     */

    private function getDatabaseContent()
    {
        $requete = 'SHOW TABLES FROM '.S_DB;

        $execution_requete = $this->dao->prepare($requete);
        $execution_requete->execute();

        $tables = $champ = [];

        while ($lignes = $execution_requete->fetch(PDO::FETCH_BOTH)) {
            $requete_secondaire = 'SHOW COLUMNS FROM '.S_DB.'.'.$lignes[0];

            $execution_requete_secondaire = $this->dao->prepare($requete_secondaire);
            $execution_requete_secondaire->execute();

            while ($lignes_secondaire = $execution_requete_secondaire->fetch(PDO::FETCH_BOTH)) {
                $index = $lignes[0].'#'.$lignes_secondaire[0];
                $champ[$index] = $lignes_secondaire[0];
            }

            $tables[$lignes[0]] = $lignes[0];
        }

        return ['tables' => $tables, 'champ' => $champ];
    }

    public function makeconstfile($route, $prefixe)
    {
        $infos = $this->getDatabaseContent();

        $fichier = fopen($route.'/core/_const_bd.php', 'w+');

        $contenu = "<?php \n\n/* Le fichier contient l'ensemble des tables de la base de données connectée ainsi que leurs champs.*/ \n\n";

        foreach ($infos['tables'] as $cle => $valeur) {
            $contenu .= '// Table '.strtoupper($valeur)." et ses champs. \n";

            $contenu .= 'const '.strtoupper($cle)." = '".($valeur)."', ";

            foreach ($infos['champ'] as $cle1 => $valeur1) {
                $concordance = explode('#', $cle1);

                ($concordance[0] === $cle) ? $contenu .= strtoupper(substr($cle, strlen($prefixe), strlen($cle))).'_'.strtoupper($valeur1)." = '".($valeur1)."', " : '';
            }

            $contenu .= ";\n\n";
        }

        fwrite($fichier, str_replace(', ;', ';', $contenu));

        fclose($fichier);

        echo 'Fichier de constantes généré avec succès !';
    }

    //[ - Fonctions spécifiques pour SLM - ]

    public function userUnique($donnees)
    {
        $id_by_email = $this->getIdByField('email', $donnees['email']);

        $id_by_login = $this->getIdByField('login', $donnees['login']);

        $poids = 0;

        if (!isset($donnees['id'])) {
            if ($id_by_email > 0) {
                $poids += 1;
            }
            if ($id_by_login > 0) {
                $poids += 2;
            }
        } else {
            if ($id_by_email > 0 && $donnees['id'] != $id_by_email) {
                $poids += 1;
            }
            if ($id_by_login > 0 && $donnees['id'] != $id_by_login) {
                $poids += 2;
            }
        }

        return $this->poids($poids);
    }

    private function poids($poids)
    {
        $text = [1, 'Cette adresse e-mail est déjà prise par un autre utilisateur.', 'Ce login est déjà pris par un autre utilisateur.', 'Cette adresse e-mail et ce login sont déjà pris par un autre utilisateur.'];

        return $text[$poids];
    }

    public function getElementType($types = [], $pour = '')
    {
        $chaine = implode('", "', $types);

        $donnees = $this->getAllDatas("type IN (\"$chaine\") AND actif = 1", 'rang');

        $retour = [];

        foreach ($donnees as $valeur) {
            if ($pour == '' || $pour == 'liste') {
                $retour[$valeur->type][$valeur->id] = ['constante_libelle' => $valeur->constante_libelle, 'libelle' => $valeur->libelle, 'pictogramme' => $valeur->pictogramme];
            }

            if ($pour == 'form') {
                $retour[$valeur->type][] = (object) ['id' => $valeur->id, 'constante_libelle' => $valeur->constante_libelle, 'libelle' => $valeur->libelle, 'pictogramme' => $valeur->pictogramme];
            }

            if ($pour == 'const') {
                $retour[$valeur->constante_libelle][] = ['id' => $valeur->id, 'libelle' => $valeur->libelle, 'pictogramme' => $valeur->pictogramme];
            }
        }

        return $retour;
    }

    public function estAccessible($chemin = [])
    {
        if ($this->superadmin()) {
            return true;
        }

        $clause['module'] = $chemin['module'];

        if (isset($chemin['action'])) {
            $clause['action'] = $chemin['action'];
        }

        if (isset($chemin['element']) && !empty($chemin['element'])) {
            $clause['element'] = $chemin['element'];
        }

        $id_acces_module = $this->getIdByArray($clause);

        if ($id_acces_module > 0) {
            $this->settable(SLM_ACCES_MODULE_TYPE_UTILISATEUR);

            $id_acces_module_type_utilisateur = $this->getIdByArray([ACCES_MODULE_TYPE_UTILISATEUR_ID_ACCES_MODULE => $id_acces_module, ACCES_MODULE_TYPE_UTILISATEUR_ID_TYPE_UTILISATEUR => $_SESSION[_USER_]->id_type_utilisateur, ACCES_MODULE_TYPE_UTILISATEUR_ACTIF => 1]);

            if ($id_acces_module_type_utilisateur > 0) {
                return true;
            }
        }

        return false;
    }

    public function traiteDonnees($donnees, $aexploder = [], $dateheure = -1)
    {
        foreach ($donnees as $cle => $valeur) {
            if (is_array($aexploder)) {
                if (in_array($cle, $aexploder)) {
                    $explode = explode('#', $valeur);
                    unset($explode[count($explode) - 1], $explode[0]);
                    $donnees[$cle] = $explode;
                }
            }

            if (is_string($valeur) && ((DateTime::createFromFormat('Y-m-d', $valeur)) !== false || (DateTime::createFromFormat('Y-m-d H:i:s', $valeur)) !== false || (DateTime::createFromFormat('Y-m-d h:i:s', $valeur)) !== false)) {
                if ($dateheure == -1) {
                    $donnees[$cle] = ($valeur != '0000-00-00' && $valeur != '0000-00-00 00:00:00') ? date('d-m-Y', strtotime($valeur)) : null;
                } else {
                    $donnees[$cle] = ($valeur != '0000-00-00' && $valeur != '0000-00-00 00:00:00') ? date('d-m-Y H:i', strtotime($valeur)) : null;
                }
            }
        }

        return $donnees;
    }

    public function historique($server, $browser, $type, $get, $specific = '')
    {
        $historique[HISTORIQUE_ACTION_DATE] = date('Y-m-d H:i:s');
        $historique[HISTORIQUE_ACTION_ADRESSE_IP] = $server['REMOTE_ADDR'];
        $historique[HISTORIQUE_ACTION_LIBELLE_HISTORIQUE] = $get['module'].((isset($get['action']) && !empty($get['action'])) ? '/'.$get['action'] : '').((!empty($specific)) ? '/'.$specific : '');
        $historique[HISTORIQUE_ACTION_NAVIGATEUR_UTILISE] = (isset($browser->browser) ? $browser->browser : '').(isset($browser->comment) ? ' ('.$browser->comment.')' : '');
        $historique[HISTORIQUE_ACTION_SE_UTILISE] = isset($browser->platform) ? $browser->platform : '';
        $historique[HISTORIQUE_ACTION_TERMINAL_UTILISE] = isset($browser->device_type) ? $browser->device_type : '';
        $historique[HISTORIQUE_ACTION_ID_UTILISATEUR] = $_SESSION[_USER_]->id;

        $this->settable(MGH_LISTE_ELEMENT_FORM);
        $historique[HISTORIQUE_ACTION_ID_TYPE_HISTORIQUE] = $this->getIdByArray([LISTE_ELEMENT_FORM_TYPE => 'TYPE_HISTORIQUE', LISTE_ELEMENT_FORM_CONSTANTE_LIBELLE => strtoupper($type)]);

        $this->settable(MGH_HISTORIQUE_ACTION);
        $this->record($historique);
    }

    public function changetat($action, $champ, $test, $id)
    {
        $tableau_id = explode(',', $id);
        if ((count($tableau_id) == 1) && (intval($tableau_id[0]) == 0)) {
            $tableau_id[0] = base64_decode($tableau_id[0]);
        }

        // pour ne pas avoir d'erreurs de requete
        if (count($tableau_id) == 0) {
            $tableau_id = [-1];
        }
        $donnees[$champ] = ($action === $test) ? -1 : 1;

        $clause = 'id IN ('.implode(', ', $tableau_id).')';

        if ($action == 'desarchivage') {
            $clause = 'id IN ('.implode(', ', $tableau_id).') ';
            // $clause = "id IN (" . implode(", ", $tableau_id) . ") AND actif <> -2 ";
        }

        return $this->updateWithFreeClause($donnees, $clause);
    }

    public function getFiles($chemin_repertoire, $lengh, $type_fichier = '/^.+\.(gif|jpe?g|png)$/i', $recursive = true)
    {
        if (!is_dir($chemin_repertoire)) {
            return [];
        }

        $fichiers = [];

        if ($recursive) {
            $dossier = new RecursiveDirectoryIterator($chemin_repertoire);
            $parcours = new RecursiveIteratorIterator($dossier);

            foreach ($parcours as $fichier) {
                if (preg_match($type_fichier, $fichier)) {
                    $fichiers[] = substr(str_replace('\\', '/', $fichier->getPathname()), $lengh);
                }
            }
        } else {
            $dossier = opendir($chemin_repertoire);
            while (false !== ($fichier = readdir($dossier))) {
                if (preg_match($type_fichier, $fichier)) {
                    $fichiers[] = substr(str_replace('\\', '/', $chemin_repertoire.$fichier), $lengh);
                }
            }
            closedir($dossier);
        }

        return $fichiers;
    }
}
