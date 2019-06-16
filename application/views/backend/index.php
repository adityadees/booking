    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

          <div class="row match-height">
            <div class="col-xl-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Products Sales</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="psale" class="height-300"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-6 col-lg-6">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Products Sales</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <div id="psaler" class="height-300"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>


          <div class="row match-height">
            <div class="col-xl-8 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Recent Orders</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                      <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                    </ul>
                  </div>
                </div>

              </div>
            </div>
            <div class="col-xl-4 col-lg-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Recent Buyers</h4>
                  <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                  <div class="heading-elements">
                    <ul class="list-inline mb-0">
                      <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                  </div>
                </div>
                
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>


    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          <?php foreach ($indexcart as $i) : ?>
            ['<?= date('M',strtotime($i['pemesanan_tanggal'])); ?>',  <?= $i['coall']; ?>],
          <?php endforeach; ?>
          ]);

        var options = {
          title: 'Jumlah Transaksi Sukses',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('psale'));
        chart.draw(data, options);
      }


    </script>

    <script type="text/javascript">

      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Profit'],

          <?php foreach ($indexcart as $i) : ?>
            ['<?= date('m-Y',strtotime($i['pemesanan_tanggal'])); ?>', <?= $i['sumtot']; ?>],
          <?php endforeach; ?>

          ]);

        var options = {
          chart: {
            title: 'Profit',
            subtitle: 'Profit Penjualan Bulanan',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('psaler'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>