<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <style>
    .container {
      width: 100%;
      /* padding-right:60px; */
      /* padding-left:60px; */
      margin-right: auto;
      margin-left: auto
    }

    table {
      font-size: 17px;
      font-family: "Arial";
    }

    table td {
      font-size: 17px;
      /*font-family:"Times New Roman";*/
    }

    td.border_bottom {
      border-bottom: 1pt solid black;
      border-left: 1pt solid black;
      border-top: 1pt solid black;
      border-right: 1pt solid black;
    }

    th.border_bottom {
      border-bottom: 1pt solid black;
      border-left: 1pt solid black;
      border-top: 1pt solid black;
      border-right: 1pt solid black;
    }

    td.border_samping {
      border-right: 1pt solid black;
    }

    table.border_gede {
      border-bottom: 1pt solid black;
      border-left: 1pt solid black;
      border-top: 1pt solid black;
      border-right: 1pt solid black;
    }

    .lebar-border {
      border: 1pt solid black;
      padding: 10px;
    }

    .text-center-tbl {
      text-align: center;
    }

    .text-right-tbl {
      text-align: right;
    }

    .text-center {
      text-align: center;
      border: 1pt solid black;
    }

    .line {
      margin: 1px 0;
      height: 1px;
      background: repeating-linear-gradient(to right,
          transparent,
          transparent 10px,
          black 10px,
          black 20px);
      /*10px transparent then 10px black -> repeat this!*/
    }

    .wrap {
      border-top: 1px dotted #000;
      position: relative;
      margin: 50px auto;
      width: 500px;
    }

    .text {
      background-color: #ffffff;
      top: -10px;
      position: absolute;
      left: 200px;
    }

    /* DoT Line With Scissors */
    #scissors {
      height: 5px;
      /* image height */
      width: 100%;
      margin: auto auto;
      background-image: url('http://i.stack.imgur.com/cXciH.png');

      background-repeat: no-repeat;
      background-position: right;
      /* position: relative; */
      overflow: hidden;
      /* padding-bottom: 50px; */
      padding-bottom: 10px;
    }

    /* Watermark */
    .watermark {
      position: relative;
      z-index: 0;
      background: white;
      display: block;
      min-height: 40%;
      min-width: 100%;
      color: yellow;
      border: 2px solid black;
      height: 200px;
    }

    .watermark:after {
      color: steelblue;
      font-size: 120px;
      /* text-align: center; */
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      opacity: 0.1
    }

    /* body {
            background: #fff repeat url("http://i.stack.imgur.com/cXciH.png");
            background-size: 100%;
            opacity: 0.2;
        } */

    .wtrmark {
      background-repeat: no-repeat;
      position: relative;
      bottom: 500px;
      left: 200px;
      z-index: 10000;
      font-size: 100px;
      color: red;
      transform: rotate(-30deg);
      opacity: 0.6;
      content: 'test';
    }

    #image {
      /* the image you want to 'watermark' */
      height: 200px;
      /* or whatever, equal to the image you want 'watermarked' */
      width: 200px;
      /* as above */
      background-image: url(path/to/image/to/be/watermarked.png);
      background-position: 0 0;
      background-repeat: no-repeat;
      position: fixed;
    }

    #image img {
      /* the actual 'watermark' */
      position: absolute;
      top: 0;
      /* or whatever */
      left: 0;
      /* or whatever, position according to taste */
      opacity: 0.5;
      /* Firefox, Chrome, Safari, Opera, IE >= 9 (preview) */
      filter: alpha(opacity=150);
      /* for <= IE 8 */
    }

    .content-container {
      position: relative;
      /* background-color: red; */
    }

    .content-container:before {
      position: absolute;
      top: 0;
      left: 0;
      background-image: url('../../module/booking/kop_k3.jpg');
      background-size: 500px;
      background-position: center;
      background-repeat: no-repeat;
      width: 100%;
      height: 100%;
      opacity: .3;
      z-index: 2;
    }

    .content-container .contents {
      position: relative;
      z-index: 5;
    }

    /* Word Spacing */
    #word-space {
      line-height: 1.8;
    }
  </style>
</head>

<body>

  <div class="container">

    <table width="1159" style="border: 1pt solid black">
      <tr>

        <td width="700" style="padding-left: 30px; font-style: italic; text-align:left; border-left: 1pt solid black; color: #000; background-color: #A9E2F5;">
          <strong style="font-size: 20px;">WEARSAREY</strong>
          <br>
          <p>Jakarta barat, 081218169265</p>
          <p>Wearsareyjakarta@gmail.com</p>
        </td>
        <!-- <td style="text-align:center;"></?php echo date("d/m/Y"); ?></td> -->
      </tr>
    </table>

    <br>

    <div style="margin-top:10px;text-align:center;">
      <p>Laporan Bulan <?php echo $tanggal; ?></p>
    </div>

    <table width="1159" style="border-collapse: collapse;" class="">
      <thead style="font-size: 12px;">
        <tr>
          <td class="text-center">
            <p>
              No
            </p>
          </td>
          <td class="text-center">
            <p>
              Nama Penerima
            </p>
          </td>
          <td class="text-center">
            <p>
              No Order
            </p>
          </td>
          <td class="text-center">
            <p>
              Tanggal Order
            </p>
          </td>
          <td class="text-center">
            <p>
              Total
            </p>
          </td>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $total = 0;
        ?>
        <?php foreach ($report_produk as $report) : ?>
          <tr>
            <td class="text-center"><?php echo $no; ?></td>
            <td class="text-center"><?php echo $report['nama_penerima']; ?></td>
            <td class="text-center"><?php echo $report['no_order']; ?></td>
            <td class="text-center"><?php echo $report['tgl_order']; ?></td>
            <td class="text-center">Rp<?php echo  number_format($report['grand_total']); ?></td>
          </tr>
          <?php
          $total += $report['grand_total'];
          ?>
        <?php endforeach; ?>
        <tr>
          <td class="text-center">Total</td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <td class="text-center"></td>
          <td class="text-center"><?php echo number_format($total); ?></td>
        </tr>
      </tbody>
    </table>

  </div>


</body>

</html>