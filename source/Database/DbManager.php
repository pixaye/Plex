<?php

/*
 * Copyright (C) 2015 Gor Mkhitaryan
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace Source\Database;

/**
 * Description of DbManager
 *
 * @author Gor Mkhitaryan
 */
class DbManager implements DbInterface {

    /**
     * Contains the object of PDO
     * @var type 
     */
    private $db;

    /**
     * Connecting to DB
     */
    public function connect()
    {
        $dbConnector = new DbConnector;

        $this->db = $dbConnector;
    }

    /**
     * Prepared query
     * @param type $query
     * @param type $bindParams
     * @return type
     */
    public function query($query, $bindParams = null)
    {
        if (!empty($query)) {
            $query = $this->db->prepare($query);
            $query->execute($bindParams);

            return $query;
        }
    }

    /**
     * Raw query, without preparing
     * @param type $query
     */
    public function raw_query($query)
    {
        if (!empty($query)) {
            $this->db->exec($query);
        }
    }

    /**
     * Closing db connection
     */
    public function close()
    {
        $this->db = null;
    }

}
