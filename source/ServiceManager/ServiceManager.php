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

namespace Source\ServiceManager;

/**
 * Description of ServiceManager
 *
 * @author Gor Mkhitaryan
 */
class ServiceManager {

    /**
     * Array which contains services
     * @var type 
     */
    protected static $services;

    protected function __construct()
    {
        
    }

    protected function __clone()
    {
        
    }

    /**
     *  Method which puts objects of services into the array
     * @param type $name
     * @param type $object
     * @throws Exception
     */
    public static function set($name, $object)
    {

        if (!empty($name) && !empty($object) && is_object($object)) {
            self::$services[$name] = $object;
        } else {
            throw new \Exception("Empty service name or its object!");
        }
    }

    /**
     * Returns the object of service
     * @param type $name
     * @return type
     */
    public static function get($name)
    {
        return (isset(self::$services[$name])) ? self::$services[$name] : null;
    }

    /**
     * Returns true if the service $name exists
     * @param type $name
     * @return type
     */
    public function exists($name)
    {
        return isset(self::$store[$name]);
    }

    /**
     * Return all objects
     * @return type
     */
    public function getAll()
    {
        return self::$services;
    }

}
