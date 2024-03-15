<!-- ---- CONTENT ----  -->
<div class="Admin--content">
    <div class="Admin--content--container">
        <div class="Admin--content--container--title">
            <h1>Thống kê sản phẩm theo danh mục</h1>
        </div>
        <div class="Admin--content--container--table">
            <div id="piechart">
            </div>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                google.charts.load('current', {
                    'packages': ['corechart']
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                        ['Danh mục', 'Số lượng sản phẩm'],
                        <?php
                        $tongdm = count($listthongke);
                        $i = 1;
                        foreach ($listthongke as $thongke) {
                            extract($thongke);
                            if ($i == $tongdm) $dauphay = "";
                            else $dauphay = ",";
                            echo "['" . $thongke['tendm'] . "', " . $thongke['countsp'] . "]" . $dauphay;
                            $i += 1;
                        }
                        ?>
                    ]);

                    var options = {
                        'title': '',
                        'width': 900,
                        'height': 700
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            </script>
        </div>
    </div>
</div>
<!-- ********************* CSS ***************************  -->
<link rel="stylesheet" href="../content/css/list-danhmuc.css">