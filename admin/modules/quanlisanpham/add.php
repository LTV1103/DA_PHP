<div class="form_addCate">
    <table border="1" cellpadding="10" cellspacing="0">
        <form action="modules/quanlisanpham/controll.php" method="POST">
            <tr>
                <td>Nhập tên sản phẩm</td>
                <td><input type="text" name="tensp"></td>
            </tr>
            <tr>
                <td>Mã sản phẩm</td>
                <td><input type="text" name="masp"></td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td><input type="text" name="giasp"></td>
            </tr>
            <tr>
                <td>Số lượng</td>
                <td><input type="text" name="soluongsp"></td>
            </tr>
            <tr>
                <td>Nội dung</td>
                <td><textarea rows="5" name="noidungsp"></textarea></td>
            </tr>
            <tr>
                <td>Tóm tắt</td>
                <td><textarea rows="5" name ="noidungsp"></textarea></td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td><input type="file" name="hinhanhsp"></td>
            </tr>
            <tr>
                <td>Thứ Tự</td>
                <td><input type="text" name="thutusanpham"></td>
            </tr>
            <tr>
                <td>Tình trạng</td>
                <td><select>
                    <option>Kích hoạt</option>   
                    <option>Ẩn</option>   
                    </select></td>
            </tr>
            <tr>
                <td><button type="submit" name="btnAdd">Thêm</button></td>
            </tr>
        </form>
    </table>
</div>