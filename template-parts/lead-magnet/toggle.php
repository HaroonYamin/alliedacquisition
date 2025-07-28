<?php
    $enable = get_field('hy_lead_enable_this_feature', 'option');
    if( !$enable ) {
        return;
    }
?>

<div class="fixed top-1/2 right-0 transform -translate-y-1/2 z-10" onclick="displayLeadMagnet();">
    <div id="hy-lead-magnet-toggle">
        <p class="sm:text-lg text-base text-black bg-light-green border-light-green cursor-pointer px-4 py-2 hover:bg-green hover:text-white transition writing-sideway">Get Free PDF</p>
    </div>
</div>