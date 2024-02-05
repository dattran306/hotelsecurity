<?php
require './cl.php';
require './conn.php';

$stmt = "SELECT COUNT(nhanvien.ID) SL, nhanvien.Department Department
            FROM tblEventTemp, nhanvien
            WHERE tblEventTemp.TicketName=nhanvien.TicketName 
            GROUP BY nhanvien.Department
            ";
   $query = sqlsrv_query($conn, $stmt);
   $department = array();
   $amount = array();

while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
{
    array_push($department,$result["Department"]);
    array_push($amount,$result["SL"]);
}
array_push($department,"Trainee+CL");
array_push($amount,$amountOfCL);

?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!--  -->
        <canvas id="myChart"></canvas>


<!--  -->
<script>
  const labels = 
    <?php echo json_encode($department); ?>
  ;


const data = {
  labels: labels,
  datasets: [{
    label: 'THỐNG KÊ NHÂN VIÊN ĐANG ĐI LÀM THEO BỘ PHẬN',
    data: <?php echo json_encode($amount); ?>,
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};


const config = {
  type: 'bar',
  data: data,
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  },
};
</script>


<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>