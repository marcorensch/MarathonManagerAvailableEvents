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

if(count($events) > 1){
    $height = 'small';
}else{
    $height = 'medium';
}

?>
<?php if($isroot):?>
<div class="uk-tile uk-tile-secondary uk-border-rounded uk-padding-small uk-margin-bottom">
    <div class="uk-text-center">Du bist als Administrator angemeldet &amp; kannst alle kommenden Events sehen.</div>
</div>
<?php endif; ?>
<div class="uk-margin" uk-margin>
    <?php if($events && count($events)){
        foreach ($events as $event){
            include 'widgets/event.php';
        }
    }else{
        include 'widgets/noevents.php';
    }
    ?>
</div>
