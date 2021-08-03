<?php
/**
 * @package    mod_mmanager_avevents
 *
 * @author     proximate <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

use Joomla\CMS\Helper\ModuleHelper;

defined('_JEXEC') or die;

// Include Components Router
require_once JPATH_ROOT . '/components/com_nxmarathonmanager/helpers/nxmarathonmanager.php';
require_once JPATH_ROOT . '/components/com_nxmarathonmanager/helpers/route.php';

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

$user = JFactory::getUser();
$isroot = $user->authorise('core.admin');



$events = ModMManagerAvEventsHelper::getAvEvents();

// The below line is no longer used in Joomla 4
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require ModuleHelper::getLayoutPath('mod_mmanager_avevents', $params->get('layout', 'default'));
