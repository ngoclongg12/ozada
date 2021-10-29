SELECT danhsach_donhang.id_dh, thongtin_kh_donhang.* 
FROM danhsach_donhang 
INNER JOIN thongtin_kh_donhang ON danhsach_donhang.id_tt_kh=thongtin_kh_donhang.id_tt_kh;