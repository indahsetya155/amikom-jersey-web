/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";
// Tanggal
function splitTGL(tgl) {
    var splitarray1 = tgl.split(' ');
    return langTGL(splitarray1[0])
}

function langTGL(tgl) {
    var lang = "{{Lang::locale()}}";

    if (lang == "id") {
        var bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        var tggl = new Date(tgl);
        var tanggal = tggl.getDate();
        var xbulan = tggl.getMonth();
        var xtahun = tggl.getYear();
        //   console.log(tanggal);
        //   console.log(xbulan);
        //   console.log(xtahun);
        var bulan = bulan[xbulan];
        var tahun = (xtahun < 1000) ? xtahun + 1900 : xtahun;
        return tanggal + " " + bulan + " " + tahun;
    } else if (lang == "en") {
        var bulan = ['Jan', 'Feb', 'Mar', 'Apr', 'Mey', 'Jun', 'Jul', 'Agus', 'Sept', 'Okt', 'Nov', 'Des'];
        var tggl = new Date(tgl);
        var tanggal = tggl.getDate();
        var xbulan = tggl.getMonth();
        var xtahun = tggl.getYear();
        var bulan = bulan[xbulan];
        var tahun = (xtahun < 1000) ? xtahun + 1900 : xtahun;
        return bulan + " " + tanggal + ", " + tahun;
    } else if (lang == "jp") {
        var tggl = new Date(tgl);
        var tanggal = tggl.getDate();
        var xbulan = tggl.getMonth();
        var xtahun = tggl.getYear();
        var tahun = (xtahun < 1000) ? xtahun + 1900 : xtahun;
        return tahun + "年 " + (xbulan + 1) + "月 " + tanggal + "日";
    } else if (lang == "kr") {
        var tggl = new Date(tgl);
        var tanggal = tggl.getDate();
        var xbulan = tggl.getMonth();
        var xtahun = tggl.getYear();
        var tahun = (xtahun < 1000) ? xtahun + 1900 : xtahun;
        return tahun + "년 " + (xbulan + 1) + "월 " + tanggal + "일";
    }
}

// Uang
function IDRFormat(nominal) {
    var IDR = nominal.toString(),
        sisa = IDR.length % 3,
        rupiah = IDR.substr(0, sisa),
        ribuan = IDR.substr(sisa).match(/\d{3}/g);
    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }
    return "Rp. " + rupiah;
}