<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_mmanager_events
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Date\Date;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

class ModMManagerAvEventsHelper{

    public static function getAvEvents(){
        $currentTime = new Date('now'); // Current date and time
        $user = JFactory::getUser();
        $isroot = $user->authorise('core.admin');
        try{
            $db = JFactory::getDbo();
            $query = $db->getQuery(true);
            $query->select('*');
            $query->from($db->quoteName('#__nxmarathonmanager_event'));
            $query->where($db->quoteName('published') . ' = ' . $db->quote('1'));
            $query->where($db->quoteName('eventdate') . ' > ' . $db->quote($currentTime));
            if(!$isroot){
                $query->where($db->quoteName('event_reg_start') . ' < ' . $db->quote($currentTime));
                $query->where($db->quoteName('event_reg_end') . ' > ' . $db->quote($currentTime));
            }

            $query->order('eventdate DESC');

            $db->setQuery($query);

            //var_dump($query->dump());

            $results = $db->loadObjectList();

            // Bring the date in form
            foreach ($results as $result){
                $result->eventdate = HtmlHelper::date($result->eventdate, Text::_('DATE_FORMAT_FILTER_DATE'));
            }

            return $results;

        } catch (Exception $e){
            JFactory::getApplication()->enqueueMessage(   $e->getMessage(), 'error');
        }
    }

}