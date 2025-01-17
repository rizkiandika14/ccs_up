
<section class="content">
 <div class="login" data-login="<?= $this->session->flashdata('pesan') ?>">
         <?php if ($this->session->flashdata('pesan')) { ?>

         <?php } ?>
         <div class="row clearfix">
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                 <div class="card">
                     <div class="header">
                         <div class="row clearfix">
                             <div class="col-xs-12 col-sm-6">
                                 <h4>SELAMAT DATANG DI CUSTOMER CARE SYSTEM</h4>
                             </div>
                             <div class="col-xs-12 col-sm-6 align-right">
                                 <div class="switch panel-switch-btn">
                                     <!-- <span class="m-r-10 font-12">REAL TIME</span>
                                        <label>OFF<input type="checkbox" id="realtime" checked><span class="lever switch-col-cyan"></span>ON</label> -->

                                 </div>
                             </div>

                         </div>
                         <hr>
                         <h5><b>DATA PELAPORAN</b></h5>
                        <br>
                         <?php
                               $totalp = $this->db->query("SELECT count(id_pelaporan) as totalp FROM pelaporan where status_ccs = 'ADDED'");

                            foreach ($totalp->result() as $total) {
                            ?>

                         <div class="row clearfix">
                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                 <div class="info-box bg-blue hover-expand-effect">
                                     <div class="icon">
                                         <a href="<?php echo base_url('supervisor/added') ?>">
                                             <i class="material-icons">playlist_add_check</i>
                                         </a>
                                     </div>
                                     <div class="content">
                                         <div class="text">NEW TIKET</div>
                                         <div class="number"><?php echo $total->totalp ?></div>
                                     </div>
                                 </div>
                             </div>
                             <?php } ?>

                             <?php
                                    $totalp = $this->db->query("SELECT count(id_pelaporan) as totalp FROM pelaporan where status_ccs = 'HANDLE'");

                                foreach ($totalp->result() as $total) {
                                ?>
                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                 <div class="info-box bg-cyan hover-expand-effect">
                                 <div class="icon">
                                         <a href="<?php echo base_url('supervisor/onprogress') ?>">
                                             <i class="material-icons">assignment_turned_in</i>
                                         </a>
                                     </div>
                                     <div class="content">
                                         <div class="text">HANDLE</div>
                                         <div class="number"><?php echo $total->totalp ?></div>
                                     </div>
                                 </div>
                             </div>
                             <?php } ?>

                             <?php
                                   $totalp = $this->db->query("SELECT count(id_pelaporan) as totalp FROM pelaporan where status_ccs = 'CLOSE'");

                                foreach ($totalp->result() as $total) {
                                ?>
                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                 <div class="info-box bg-orange hover-expand-effect">
                                     <div class="icon">
                                         <a href="<?php echo base_url('supervisor/close') ?>">
                                             <i class="material-icons">report</i>
                                         </a>
                                     </div>
                                     <div class="content">
                                         <div class="text">CLOSE</div>
                                         <div class="number"><?php echo $total->totalp ?></div>
                                     </div>
                                 </div>
                             </div>
                             <?php } ?>

                             <?php
                                    $totalp = $this->db->query("SELECT count(id_pelaporan) as totalp FROM pelaporan where status_ccs = 'FINISH'");

                                foreach ($totalp->result() as $total) {
                                ?>
                             <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                 <div class="info-box bg-light-green hover-expand-effect">
                                     <div class="icon">
                                         <a href="<?php echo base_url('supervisor/finish') ?>">
                                             <i class="material-icons">done_all</i>
                                         </a>
                                     </div>
                                     <div class="content">
                                         <div class="text">FINISH</div>
                                         <div class="number"><?php echo $total->totalp ?></div>
                                     </div>
                                 </div>
                             </div>
                             <?php } ?>

                     
                           
                         </div>
                     </div>

                 </div>
             </div>
             
              <!-- DIAGRAM -->
         <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Priority</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <canvas id="bar_chart"></canvas>
                        </div>
                    </div>
                </div>
                <!-- end diagram -->


                <!-- TIKET -->
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="font-bold m-b--35"> TICKETS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    TODAY
                                    <span class="pull-right"><b><?= total_today()?></b> <medium>TICKETS</medium></span>
                                </li>
                                <li>
                                    YESTERDAY
                                    <span class="pull-right"><b><?= total_yesterday()?></b> <medium>TICKETS</medium></span>
                                </li>
                                <li>
                                    LAST WEEK
                                    <span class="pull-right"><b><?= total_lastweek()?></b> <medium>TICKETS</medium></span>
                                </li>

                                <li>
                                    LAST MONTH
                                    <span class="pull-right"><b><?= total_lastmonth()?></b> <medium>TICKETS</medium></span>
                                </li>

                                <li>
                                    THIS MONTH
                                    <span class="pull-right"><b><?= total_thismonth()?></b> <medium>TICKETS</medium></span>
                                </li>
                                
                                <li>
                                    ALL 
                                    <span class="pull-right"><b><?= total_all()?></b> <medium>TICKETS</medium></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end ticket -->

                <!-- Jumlah BPR -->
             <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>KLIEN INFO</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Klien</th>
                                            <th>Total Pelaporan</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($data_bpr as $bp) : ?>
                                        <tr>
                                            <td><?= $no++?></td>
                                            <td><?= $bp['nama'];?></td>
                                            <td><?= $bp['jumlah'];?></td>
                                            
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END KLIEN INFO -->
              
         </div>

        
 </section>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script type="text/javascript">
  const ctx = document.getElementById('bar_chart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['High', 'Medium', 'Low'],
      datasets: [{
        label: '#Priority',
        data: [<?=total_high()?>,<?=total_medium()?>,<?=total_low()?>],
        // backgroundColor: ['rgba(233, 30, 99, 0.8)', '#FFC107', 'rgba(0, 188, 212, 0.8)'],
        backgroundColor:['rgb(255, 99, 132)', 'rgb(255, 205, 86)','rgb(54, 162, 235)',],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
}
  });
</script>

<!-- <script src="<?= base_url('vendor/AdminBSBMaterialDesign-master/'); ?>plugins/chartjs/Chart.bundle.js"></script>
<script>
    $(function () {
  
    new Chart(document.getElementById("bar_chart").getContext("2d"), getChartJs('bar'));
});

function getChartJs(type) {
    var config = null;

    if (type === 'bar') {
        config = {
            type: 'bar',
            data: {
                labels: ["January", "February", "March", "April", "May", "June", "July"],
                datasets: [{
                    label: "My First dataset",
                    data: [65, 59, 80, 81, 56, 55, 40],
                    backgroundColor: 'rgba(0, 188, 212, 0.8)'
                }, {
                        label: "My Second dataset",
                        data: [28, 48, 40, 19, 86, 27, 90],
                        backgroundColor: 'rgba(233, 30, 99, 0.8)'
                    }]
            },
            options: {
                responsive: true,
                legend: false
            }
        }
    }
    return config;
}
</script> -->