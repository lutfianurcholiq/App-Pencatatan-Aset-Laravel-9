// Datatables
$('#dataTables').DataTable({
    "paging": true,
    "lengthMenu": [5,10,20,50,100],
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
});

// Summernote
$('#deskripsi').summernote({
  tabsize: 2,
  height: 120,
  toolbar: [
    ['style', ['style']],
    ['font', ['bold', 'underline']],
    ['color', ['color']],
    ['para', ['ul', 'ol', 'paragraph']]
  ]
});

// Auto select Kecamatan
  $('#kota_id').change(function() {
    var kota_id = $(this).val();
    if(kota_id){
        $.ajax({
            type:"GET",
            url:"/sekolah/getkecamatan/"+kota_id,
            dataType: 'JSON',
            success:function(res){
              if(res){
                $("#kecamatan_id").empty();
                $("#kecamatan_id").append('<option>Pilih Kecamatan</option>');
                $.each(res,function(id,nama_kecamatan){
                    $("#kecamatan_id").append('<option value="'+id+'">'+nama_kecamatan+'</option>');
                });
              }else{
                $("#kecamatan_id").empty();
              }
            }
        });
    }else{
      $("#kecamatan_id").empty();
    }
  });

  // Auto Select Aset
  $('#sekolah_id').change(function() {
    var sekolah_id = $(this).val();
    if(sekolah_id){
        $.ajax({
            type:"GET",
            url:"/penyusutan/getaset/"+sekolah_id,
            dataType: 'JSON',
            success:function(res){
              if(res){
                $("#cari_aset").empty();
                $("#cari_aset").append('<option value=""></option>');
                $.each(res,function(id,nama_aset){
                    $("#cari_aset").append('<option value="'+id+'">'+nama_aset+'</option>');
                });
              }else{
                $("#cari_aset").empty();
              }
            }
        });
    }else{
      $("#cari_aset").empty();
    }
  });

  // SINCE
  window.onload = function () {

    var year = document.getElementById("tahun");

    var currentYear = (new Date()).getFullYear();

    for (var i = 1950; i <= currentYear; i++) {

      var option = document.createElement("option");
      option.innerHTML = i;
      option.value = i;
      year.appendChild(option);
      
    }
  }

// Nominal Rupiah 

  // var rupiah = document.getElementById("harga_beli");
  // rupiah.addEventListener("keyup", function (e) {
  //     rupiah.value = formatRupiah(this.value, "Rp. ");
  // });

  // function formatRupiah(angka, prefix){
  //   var number_string = angka.replace(/[^,\d]/g, '').toString(),
  //   split   		= number_string.split(','),
  //   sisa     		= split[0].length % 3,
  //   rupiah     		= split[0].substr(0, sisa),
  //   ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

  //   // tambahkan titik jika yang di input sudah menjadi angka ribuan
  //   if(ribuan){
  //     separator = sisa ? '.' : '';
  //     rupiah += separator + ribuan.join('.');
  //   }

  //   rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
  //   return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
  // }


// SELECT 2
  $(function () {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })

// show and hide card penyusutan

  $(document).ready(function () {
    $('#show').click(function () {
      $('#card-susut').show()
    })
  })

// button kembali
  function goBack(){
    window.history.back();
  }



