<?php
/**
 * PHPUnit
 *
 * Copyright (c) 2002-2012, Sebastian Bergmann <sb@sebastian-bergmann.de>.
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions
 * are met:
 *
 *   * Redistributions of source code must retain the above copyright
 *     notice, this list of conditions and the following disclaimer.
 *
 *   * Redistributions in binary form must reproduce the above copyright
 *     notice, this list of conditions and the following disclaimer in
 *     the documentation and/or other materials provided with the
 *     distribution.
 *
 *   * Neither the name of Sebastian Bergmann nor the names of his
 *     contributors may be used to endorse or promote products derived
 *     from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS
 * FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 * COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT,
 * INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING,
 * BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
 * LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
 * CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT
 * LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN
 * ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 * @package    DbUnit
 * @author     Mike Lively <m@digitalsandwich.com>
 * @copyright  2002-2012 Sebastian Bergmann <sb@sebastian-bergmann.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link       http://www.phpunit.de/
 * @since      File available since Release 1.0.0
 */

/**
 * Creates the appropriate Persistor based on a given type and spec.
 *
 * @package    DbUnit
 * @author     Mike Lively <m@digitalsandwich.com>
 * @copyright  2010 Mike Lively <m@digitalsandwich.com>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: 1.1.2
 * @link       http://www.phpunit.de//**
 * @since      Class available since Release 1.0.0
 */
class PHPUnit_Extensions_Database_DataSet_Persistors_Factory
{
    /**
     * Returns the persistor.
     *
     * @param string $type
     * @param string $spec
     * @return PHPUnit_Extensions_Database_DataSet_IPersistable
     */
    public function getPersistorBySpec($type, $spec)
    {
        switch (strtolower($type)) {
            case 'xml':
                $xmlPersistor = new PHPUnit_Extensions_Database_DataSet_Persistors_Xml();
                $xmlPersistor->setFileName($spec);
                return $xmlPersistor;

            case 'flatxml':
                $flatXmlPersistor = new PHPUnit_Extensions_Database_DataSet_Persistors_FlatXml();
                $flatXmlPersistor->setFileName($spec);
                return $flatXmlPersistor;

            case 'yaml':
                $yamlPersistor = new PHPUnit_Extensions_Database_DataSet_Persistors_Yaml();
                $yamlPersistor->setFileName($spec);
                return $yamlPersistor;

            default:
                throw new PHPUnit_Extensions_Database_Exception("I don't know what you want from me. PERSISTOR");
        }
    }
}
