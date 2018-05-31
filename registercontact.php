<?php
# @Author: SPEDI srl
# @Date:   24-01-2018
# @Email:  sviluppo@spedi.it
# @Last modified by:   SPEDI srl
# @Last modified time: 27-02-2018
# @License: GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
# @Copyright: Copyright (c) SPEDI srl

defined('_JEXEC') or die;

class plgContactRegisterContact extends JPlugin {

		public function onSubmitContact(&$contact, &$data) {

			// var_dump($contact);
			// var_dump($data);
			//
			// var_dump($_SERVER['REMOTE_ADDR']);
			//
			// var_dump(time());
			// var_dump($_SERVER);
			//
			$params = json_encode(array(	"PAGE" 					  => $_SERVER['REQUEST_URI'],
																		"REQUEST_METHOD"  => $_SERVER['REQUEST_METHOD'],
																		"SERVER_PROTOCOL" => $_SERVER['SERVER_PROTOCOL'],
																		"REQUEST_SCHEME"  => $_SERVER['REQUEST_SCHEME']
																	));

			//Get a db connection.
			$db = JFactory::getDbo();

			// Create a new query object.
			$query = $db->getQuery(true);

			// Insert columns.
			$columns = array('name', 'email', 'object', 'message', 'accept', 'timestamp', 'server');
			// Insert values.
			$values = array();
			foreach ($data as $value) {
				$values[] = $db->quote($value);
			}
			$values[] = $db->quote(date("Y-m-d H:i:s"));
			$values[] = $db->quote($params);

			// Prepare the insert query.
			$query
			    ->insert($db->quoteName('#__registration_contact_form'))
			    ->columns($db->quoteName($columns))
			    ->values(implode(',', $values));

			// Set the query using our newly populated query object and execute it.
			$db->setQuery($query);
			$db->execute();

		}

}
