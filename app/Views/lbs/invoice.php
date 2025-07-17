<style>
[contenteditable="true"]:hover{
  outline: lightblue auto 5px;
  outline: -webkit-focus-ring-color auto 5px;
}
body{
  background: #f1f1f1;
  width: 100%;
  margin: 0;
  padding: 0;
}
.invoice{
  padding: 0;
  font-family: "Avenir", serif;
  font-weight: 100;
  width: 95%;
  max-width: 1000px;
  margin: 2% auto;
  box-sizing: border-box;
  padding: 20px;
  border-radius: 5px;
  background: #fff;
}
.header{
  display: flex;
  width: 100%;
  border-bottom: 2px solid #eee;
  align-items: center;
}
.header--invoice{
  order: 2;
  text-align: right;
  width: 40%;
  margin: 0;
  padding: 0;
}
.invoice--date,
.invoice--number{
  font-size: 12px;
  color: #494949;
}
.invoice--recipient{
  margin-top: 25px;
  margin-bottom: 4px;
}
.header--logo{
  order: 1;
  font-size: 32px;
  width: 60%;
  font-weight: 900;
}
.logo--address{
  font-size: 12px;
  padding: 4px;
}
.description{
  margin: auto;
  text-align: justify;
}
.items--table{
  width: 100%;
  padding: 10px;
  thead{
    background: #ddd;
    color: #111;
    text-align: center;
    font-weight: 800;
  }
  tbody{
    text-align: center;
  }
  .total-price{
    border: 2px solid #444;
    padding-top: 4px;
    font-weight: 800;
    background: lighten(green, 50%);
  }
}


</style>
<article class="invoice">
  <header class="header">
    <h1 class="header--invoice">INVOICE
      <div class="invoice--date" contenteditable="true">
          <?=date('j F Y')?>
      </div>
      <div class="invoice--number">
        INVOICE #<?=strtoupper(substr(md5($model['id']), 10))?>
      </div>
    </h1>
    <nav class="header--logo">
      <div class="header--logo-text" contenteditable="true">
        DINAS CIPTA KARYA KAB. ASAHAN
      </div>
      <div class="logo--address" contenteditable="true">
        Jl. Mahoni No.29, Mekar Baru, Kisaran, Kabupaten Asahan, Sumatera Utara 21211.
      </div>
    </nav>
  </header>
  <section class="description">
    <h5>Invoice Detail</h5>
  </section>
  <section class="line-items">
    <table class="items--table">
      <thead>
        <tr>
          <td>Item</td>
          <td>Periode</td>
          <td>Harga</td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>
            <?=$model['media']?>
          </td>
          <td>
            <?=$model['tanggal_mulai']?> - <?=$model['tanggal_selesai']?>
          </td>
          <td>
            Rp. <?=number_format($model['harga'])?>
          </td>
        </tr>
         <tr>
          <td colspan="2">
            TOTAL
          </td>
          <td class="total-price">
            Rp. <?=number_format($model['harga'])?>
          </td>
        </tr>
      </tbody>
    </table>
  </section>
</article>

<script>
window.print()
</script>