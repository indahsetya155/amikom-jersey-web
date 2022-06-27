<canvas id="myChart3"></canvas>
<script>
    var ctx = document.getElementById("myChart3").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        datasets: [{
          data: [
            {{$data["success"]}},
            {{$data["pending"]}},
            {{$data["failed"]}},
          ],
          backgroundColor: [
            '#63ed7a',
            '#3abaf4',
            '#fc544b',
          ],
          label: 'Dataset 1'
        }],
        labels: [
          'Success',
          'Pending',
          'Failed',
        ],
      },
      options: {
        responsive: true,
        legend: {
          position: 'bottom',
        },
      }
    });
</script>
