<?php

// Mang chua thong tin sinh vien
$SinhVien = array (
    array("ten" => "Nguyen DInh A", "tuoi" => 20,"diem" => 84),
    array("ten" => "Pham Minh B", "tuoi" => 20,"diem" => 82),
    array("ten" => "Nguyen Van C", "tuoi" => 20,"diem" => 85),
);
// In thong tin cho tung sinh vien
foreach ($SinhVien as $SV) {
    echo "Ten:" . $SV["ten"] . "<br>";
    echo "Tuoi:" . $SV["tuoi"] . "<br>";
    echo "Diem:" . $SV["diem"] . "<br>";

// Kiem tra diem va dua danh gia
    if ($SV["diem"] >= 80) {
        echo "Danh gia: Xuat Sac <br>";
    } else if ($SV["diem"] >= 70) {
        echo "Danh gia: Kha <br>";
    } else if ($SV["diem"] >= 60) {
        echo "Danh gia: Trung Binh <br>";
    } else {
        echo "Danh gia: Yeu <br>";
    }
    echo "<hr>";
}
//Tinh diem trung binh cua tat ca sinh vien
$TongDiem = 0;
foreach ($SinhVien as $SV) {
    $TongDiem += $SV["diem"];
}

$DiemTrungBinh = $TongDiem / count($SinhVien);
echo "Diem trung binh cua lop la: ". $DiemTrungBinh;

?>