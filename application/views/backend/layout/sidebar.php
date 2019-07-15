<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class=" navigation-header">
        <span>Menu</span><i class=" ft-minus" data-toggle="tooltip" data-placement="right"
        data-original-title="General"></i>
      </li>

      <li class="nav-item <?php if($title=='Dashboard') {echo "active";}?>">
        <a href="<?php echo base_url();?>dashboard"><i class="ft-home"></i>
          <span class="menu-title" data-i18n="">Dashboard</span>
        </a>
      </li>
      <?php if($_SESSION['user_role'] == 'admin') :?>
      <li class="nav-item <?php if($title=='Perbaikan') {echo "active";}?>">
          <a href="<?php echo base_url();?>d/perbaikan"><i class="fa fa-gear"></i>
            <span class="menu-title" data-i18n="">Perbaikan</span>
          </a>
        </li>
      <?php endif; ?>
      <li class="nav-item <?php if($title=='Riwayat') {echo "active";}?>">
        <a href="<?php echo base_url()?>d/riwayat"><i class="ft-sliders"></i>
          <span class="menu-title" data-i18n="">Riwayat</span>
        </a>
      </li>
    </ul>
  </div>
</div>

