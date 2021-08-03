<?php
/**
 * @package    mod_mmanager_avevents
 *
 * @author     proximate <your@email.com>
 * @copyright  A copyright
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://your.url.com
 */

defined('_JEXEC') or die;

?>
<div class="uk-height-<?php echo $height;?> uk-background-center-center uk-background-cover uk-position-relative uk-box-shadow-hover-large" style="background-image: url(<?php echo $event->headerimg;?>);">
    <div class="uk-overlay uk-overlay-primary uk-height-1-1 uk-flex uk-flex-middle uk-flex-center">
        <div>
            <div class="uk-position-bottom-right uk-padding-small" uk-scrollspy="target:>div;cls:uk-animation-fade; delay:800;">
                <div></div>
                <div class="uk-tile uk-tile-primary uk-padding-small uk-border-rounded uk-text-small">
                    Anmeldung jetzt offen!
                </div>
            </div>
            <h3 class="uk-h3"><?php echo $event->name;?></h3>
            <div class="uk-text-center">
                <a class="uk-position-cover"
                   href="<?php echo JRoute::_(nxmarathonmanagerHelperRoute::getEventinfoRoute($event->id));?>"
                   uk-tooltip="Jetzt für den <?php echo $event->name;?> anmelden."
                >
                </a>
            </div>
        </div>

    </div>
</div>

