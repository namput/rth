@extends('master')
@section('title', 'แบบแสดงรายได้ครัวเรือนและสถานะครัวเรือน')
@section('contact')
<form action="{{ url('save') }}" id="frmmain" name="frmmain" enctype="multipart/form-data" method="post">
    <div class="center">

        <h1 class="top">แบบแสดงรายได้ครัวเรือนและสถานะครัวเรือน</h1>
        <span>ตำบลรวมไทยพัฒนา อำเภอพบพระ จังหวัดตาก 63160</span>

        <div class="row g-2 top left">
            <h5>ที่อยู่</h5>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="no" name="no" value="" placeholder="กรุณากรอกบ้านเลขที่" required>
                    <label for="floatingInputGrid">บ้านเลขที่</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="soy" name="soy" placeholder="กรุณากรอกซอย" required>
                    <label for="floatingInputGrid">ซอย</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="road" name="road" placeholder="ถนน" required>
                    <label for="floatingInputGrid">ถนน</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <select class="form-select" for="moo" id="moo" name="moo" required aria-label="Floating label select example" required>
                        <option selected disabled value="" >หมู่ที่</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>

                    </select>
                    <label for="moo">เลือกหมู่ที่</label>
                </div>
            </div>
            <div class="col-md-4 top2"><label for="">ตำบลรวมไทยพัฒนา อำเภอพบพระ จังหวัดตาก 63160</label></div>

        </div>

        <div class="row g-2 top1 left">
            <h5>เจ้าของบ้าน</h5>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="" placeholder="กรุณากรอกชื่อ" required>
                    <label for="floatingInputGrid">ชื่อ</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรุณากรอกนามสกุล" required>
                    <label for="floatingInputGrid">นามสกุล</label>
                </div>
            </div>
        </div>
        <div class="row g-2 top1 left">
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="occupation" name="occupation" value=""
                        placeholder="กรุณากรอกอาชีพ" required>
                    <label for="floatingInputGrid">อาชีพ</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="tel" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกเบอร์โทร" maxlength="10" min="10" min="10" required>
                    <label for="floatingInputGrid" >เบอร์โทร</label>
                </div>
            </div>
        </div>
        <div class="row g-2 top1 left">

            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="cardid" name="cardid" placeholder="x-xxxxx-xxxxx-xx-x"
                        value="" onkeyup="autoTab(this)" minlength="13" maxlength="20" required>
                    <label for="floatingInputGrid">เลขบัตรประจำตัว</label>
                </div>
            </div>
            <div class="col-md top2 center">
                <label for="">สถานภาพครอบครัว</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" required>
                    <label class="form-check-label" for="inlineRadio1">อยู่ด้วยกัน</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="2" required>
                    <label class="form-check-label" for="inlineRadio2">แยกกันอยู่</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="3" required>
                    <label class="form-check-label" for="inlineRadio3">หย่าร้าง</label>
                </div>
            </div>
        </div>
        <div class="row g-2 top1 left">
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="number" class="form-control" id="family" name="family" placeholder="กรอกจำนวนสมาชิก"
                        minlength="1" maxlength="2" required min="0" max="12">
                    <label for="floatingInputGrid">จำนวนสมาชิกในครอบครัว</label>
                </div>
            </div>
        </div>
       {{--  เพิ่มสมาชิก  --}}
            <div id="addfamily"></div>

    </div>
    <div class="container center">

        <h3 class="title top">ข้อมูลสถานะครัวเรือน(กรอกเฉพาะบุคคลที่อาศัยในบ้านปัจจุบัน)</h3>
        <div class="row g-2 top1 left">
            <table class="table table-striped">
                <tr>
                    <td>
                        <h4>เลือกเฉพาะข้อที่ตรงกับความเป็นจริง เลือกได้มากกว่า 1 คำตอบ</h4>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for=""><strong>ครอบครัวมีภาระพึ่งพิง &nbsp;</strong> </label>
                    </td>
                </tr>
                <tr>
                    <td class="margin1">
                        <table>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="disabled1" name="disabled1" value="1">
                                <label class="form-check-label" for="disabled1">มีคนพิการ/เจ็บป่วยเรื้อรัง</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="disabled2" name="disabled2" value="1">
                                <label class="form-check-label" for="disabled2">ผู้สูงอายุเกินกว่า 60 ปี</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="disabled3" name="disabled3" value="1">
                                <label class="form-check-label" for="disabled3">เป็นพ่อ/แม่เลี้ยงเดี่ยว</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="disabled4" name="disabled4" value="1">
                                <label class="form-check-label" for="disabled4">ครัวเรือนไม่มีภาระพึ่งพิง</label>
                            </div>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>การอยู่อาศัย &nbsp;</strong> </label></td>
                </tr>
                <tr>
                    <td class="margin1">
                        <table>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="live1" name="live1" value="1">
                                <label class="form-check-label" for="live1">อยู่บ้านตัวเอง/เจ้าของบ้าน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="live2" name="live2" value="2">
                                <label class="form-check-label" for="live2">อยู่กับผู้อื่น/อยู่ฟรี</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="live3" name="live3" value="3">
                                <label class="form-check-label" for="live3">หอพัก</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="live4" name="live4" value="4">
                                <label class="form-check-label" for="live4">อยู่บ้านเช่า
                                    จ่ายค่าเช่าเดืนละ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input type="text" name="price" class="form-control" id="price" placeholder="จำนวนเงิน">
                            </div>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>สภาพที่อยู่อาศัย วัสดุที่ใช้ทำพื้นบ้าน (ไม่ใช่ใต้ถุนบ้าน)
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td class="margin1">
                        <table>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vasatdu1" name="vasatdu1" value="1">
                                <label class="form-check-label" for="vasatdu1">กระเบื้อง/เซรามิค</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vasatdu2" name="vasatdu2" value="1">
                                <label class="form-check-label" for="vasatdu2">ปาเก้/ไม้ขัดเงา</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vasatdu3" name="vasatdu3" value="3">
                                <label class="form-check-label" for="vasatdu3">ซีเมนต์เปลือย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vasatdu4" name="vasatdu4" value="1">
                                <label class="form-check-label" for="vasatdu4">ไม้กระดาน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vasatdu5" name="vasatdu5" value="1">
                                <label class="form-check-label" for="vasatdu5">ไวนิล/กระเบื้องยาง/เสื่อน้ำมัน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vasatdu6" name="vasatdu6" value="1">
                                <label class="form-check-label" for="vasatdu6">ไม้ไผ่</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vasatdu7" name="vasatdu7" value="1">
                                <label class="form-check-label" for="vasatdu7">ดิน/ทราย</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="vasatdu8" name="vasatdu8" value="1">
                                <label class="form-check-label" for="vasatdu8">อื่นๆ</label>
                            </div>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>วัสดุที่ใช้ทำฝาบ้าน
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td class="margin1">
                        <table>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farban1" name="farban1" value="1">
                                <label class="form-check-label" for="farban1">ฉาบซีเมนต์</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farban2" name="farban2" value="1">
                                <label class="form-check-label" for="farban2">อิฐ/ก้อนปูน/อิฐบล็อก</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farban3" name="farban3" value="1">
                                <label class="form-check-label" for="farban3">สังกะสี</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farban4" name="farban4" value="1">
                                <label class="form-check-label" for="farban4">ไม้กระดาน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farban5" name="farban5" value="1">
                                <label class="form-check-label" for="farban5">ไม้อัด</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farban6" name="farban6" value="1">
                                <label class="form-check-label"
                                    for="farban6">สมาร์ทบอร์ด/ไฟเบอร์/ซีเมนต์บอร์ด</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farban7" name="farban7" value="1">
                                <label class="form-check-label" for="farban7">ไม้ไผ่/ท่อนไม้/เศษไม้</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="farban8" name="farban8" value="1">
                                <label class="form-check-label" for="farban8">ดิน ไวนิล และอื่นๆ</label>
                            </div>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>วัสดุที่ใช้ทำหลังคา
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td class="margin1">
                        <table>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="rangcar1" name="rangcar1" value="1">
                                <label class="form-check-label" for="rangcar1">โลหะ(เช่น
                                    สังกะสี/เหล็ก/อะลูมิเนียม)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="rangcar2" name="rangcar2" value="1">
                                <label class="form-check-label" for="rangcar2">กระเบื้อง/เซรามิค</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="rangcar3" name="rangcar3" value="1">
                                <label class="form-check-label" for="rangcar3">ไม้กระดาน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="rangcar4" name="rangcar4" value="1">
                                <label class="form-check-label" for="rangcar4">ใบไม้/วัสดุธรรมชาติ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="rangcar5" name="rangcar5" value="1">
                                <label class="form-check-label" for="rangcar5">ไวนิล/กระดาษ/แผ่นพลาสติก</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="rangcar6" name="rangcar6" value="1">
                                <label class="form-check-label" for="rangcar6">อื่นๆ</label>
                            </div>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>มีห้องส้วมในที่อยู่อาศัย/บริเวณบ้าน
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="toilet" id="toilet1"
                                value="1">
                            <label class="form-check-label" for="toilet1">มี</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="toilet" id="toilet2"
                                value="2">
                            <label class="form-check-label" for="toilet2">ไม่มี</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>ที่ดินทำการเกษตรได้(รวมเช่า)
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kasad" id="kasad1"
                                value="1">
                            <label class="form-check-label" for="kasad1">ไม่ทำเกษตร</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kasad" id="kasad2"
                                value="2">
                            <label class="form-check-label" for="kasad2">ทำเกษตร</label>
                        </div>
                        [
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kasad2" id="kasad21"
                                value="1">
                            <label class="form-check-label" for="kasad21">มีที่ดินน้อยกว่า 1 ไร่</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kasad2" id="kasad22"
                                value="2">
                            <label class="form-check-label" for="kasad22">มีที่ดิน 1 ถึง 5 ไร่</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="kasad3" id="kasad23"
                                value="3">
                            <label class="form-check-label" for="kasad23">มีที่ดินเกิน 5 ไร่</label>
                        </div>
                        ]
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>แหล่งน้ำดื่ม/น้ำใช้
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td class="margin1">
                        <table>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="water1" name="water1" value="1">
                                <label class="form-check-label" for="water1">น้ำดื่มบรรจุขวด/ตู้หยอดน้ำ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="water2" name="water2" value="1">
                                <label class="form-check-label"
                                    for="water2">น้ำบ่อ/น้ำฝน/น้ำปะปาภูเขา/แม่น้ำำธาร</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="water3" name="water3" value="1">
                                <label class="form-check-label" for="water3">น้ำบาดาล</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="water4" name="water4" value="1">
                                <label class="form-check-label" for="water4">น้ำประปา</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="water5" name="water5" value="1">
                                <label class="form-check-label" for="water5">อื่นๆ</label>
                            </div>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>แหล่งไฟฟ้าหลัก
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="electricity" id="electricity1"
                                value="1">
                            <label class="form-check-label"
                                for="electricity1">ไม่มีไฟฟ้าหรือเครื่องกำหนดไฟฟ้าชนิดอื่นๆ</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="electricity" id="electricity2"
                                value="2">
                            <label class="form-check-label" for="electricity2">มีไฟฟ้า</label>
                        </div>
                        [
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="electricity2" id="electricity3"
                                value="1">
                            <label class="form-check-label" for="electricity3">เครื่องปั่นไฟ/โซลาเซลล์</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="electricity2" id="electricity4"
                                value="2">
                            <label class="form-check-label" for="electricity4">ใช้ไฟต่อพ่วง/แบตเตอรี่</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="electricity2" id="electricity5"
                                value="3">
                            <label class="form-check-label" for="electricity5">ใช้ไฟมิเตอร์</label>
                        </div>
                        ]
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>ยานพาหนะในครัวเรือน(ที่ใช้งานได้)
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="vehicle" id="vehicle1"
                                value="1">
                            <label class="form-check-label" for="vehicle1">รถยนต์ส่วนบุคคล</label>
                        </div>
                        [
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vehicle1" id="vehicle2"
                                value="1">
                            <label class="form-check-label" for="vehicle2">อายุการใช้งานเกิน 15 ปี</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="vehicle1" id="vehicle3"
                                value="2">
                            <label class="form-check-label" for="vehicle3">ไม่เกิน 15 ปี</label>
                        </div>
                        ]
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="car" id="car1"
                                value="1">
                            <label class="form-check-label" for="car1">รถปิกอัพ/รถบรรทุกเล็ก/รถเล็ก</label>
                        </div>
                        [
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="car2" id="car2"
                                value="1">
                            <label class="form-check-label" for="car2">อายุการใช้งานเกิน 15 ปี</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="car2" id="car3"
                                value="2">
                            <label class="form-check-label" for="car3">ไม่เกิน 15 ปี</label>
                        </div>
                        ]
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="carkasad" id="carkasad"
                                value="1">
                            <label class="form-check-label" for="carkasad">รถไถ/รถเกี่ยวข้าว/รถประเภทเดียวกัน</label>
                        </div>
                        [
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="carkasad1" id="carkasad1"
                                value="1">
                            <label class="form-check-label" for="carkasad1">อายุการใช้งานเกิน 15 ปี</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="carkasad1" id="carkasad2"
                                value="2">
                            <label class="form-check-label" for="carkasad2">ไม่เกิน 15 ปี</label>
                        </div>
                        ]
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="carmoto" id="carmoto"
                                value="1">
                            <label class="form-check-label"
                                for="carmoto">รถมอเตอร์ไซต์/เรือประมงพื้นบ้าน(ขนาดเล็ก)</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="carno" id="carno"
                                value="1">
                            <label class="form-check-label" for="carno">ไม่มียานพาหนะในครัวเรือน</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="margin1"><label for=""><strong>ของใช้ในครัวเรือน(ที่ใช้งานได้)
                                &nbsp;</strong> </label> </td>
                </tr>
                <tr>
                    <td class="margin1">
                        <table>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="air" name="air" value="1">
                                <label class="form-check-label" for="air">แอร์</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="tv" name="tv" value="1">
                                <label class="form-check-label" for="tv">โทรทัศน์จอแบน</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="com" name="com" value="1">
                                <label class="form-check-label" for="com">คอมพิวเตอร์</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="refrigerator" name="refrigerator" value="1">
                                <label class="form-check-label" for="refrigerator">ตู้เย็น</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="washer" name="washer" value="1">
                                <label class="form-check-label" for="washer">เครื่องซักผ้า</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="nohave" value="1">
                                <label class="form-check-label" for="nohave">ไม่มีของใช้ดังกล่าว</label>
                            </div>
                        </table>
                    </td>
                </tr>
            </table>

        </div>
        <h3 class="title top1">ภาพถ่ายที่พักอาศัย</h3>
        <div class="row row-cols-2 top">
            <div class="col">
                <label for="formGroupExampleInput" class="form-label"><strong>รูปถ่ายนอกที่พักอาศัย</strong> </label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="pic1" name="pic1" required>
                    <label class="input-group-text" for="pic1">อัพโหลด</label>
                </div>
            </div>
            <div class="col">
                <label for="formGroupExampleInput" class="form-label"><strong>รูปถ่ายภายในที่พักอาศัย</strong> </label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="pic2" name="pic2" required>
                    <label class="input-group-text" for="pic2">อัพโหลด</label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary active top " data-bs-toggle="submit" id="submit2" autocomplete="off"
            aria-pressed="true"><i class="fa fa-floppy-o fa-lg" aria-hidden="true"></i> บันทึกข้อมูล</button>
            <button type="button" class="btn btn-primary active top " data-bs-toggle="submit" id="submit3" autocomplete="off" disabled
            aria-pressed="true"><i class="fa fa-spinner fa-pulse fa-fw"></i>
            <span class="sr-only">Loading...</span> กำลังบันทึกข้อมูล</button>
            <button type="reset" class="btn btn-warning active top " data-bs-toggle="reset" id="reset" autocomplete="off"
            aria-pressed="true"><i class="fa fa-refresh" aria-hidden="true"></i> เริ่มฟอร์มใหม่</button>


    </div>
</form>
    <script>
        $(document).ready(function() {
            $("#addfamily").hide();
            $("#submit3").hide();

            $('#family').change(function() {

                var amount = $('#family').val();
                var htmls = "";
                for (var i = 1; i <= amount; i++) {
                    htmls += `<div style="border-block-color: black;border-style: solid; text-align: center;border: 3px solid;" class="top container margin1">
                            <div class="row g-2 top1 left">
                                <h5>สมาชิกในครบครัว คนที่ ${i}</h5>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="firstname${i}" name="firstname${i}" required
                                            placeholder="กรุณากรอกชื่อ">
                                        <label for="floatingInputGrid">ชื่อ</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="lastname${i}" name="lastname${i}" required
                                            placeholder="กรุณากรอกนามสกุล">
                                        <label for="floatingInputGrid">นามสกุล</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="cardid${i}" name="cardid${i}" required
                                            placeholder="x-xxxxx-xxxxx-xx-x" value="" onkeyup="autoTab(this)" minlength="13"
                                            maxlength="20">
                                        <label for="floatingInputGrid">เลขบัตรประจำตัว</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 top1 left">

                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="about${i}" name="about${i}" required
                                            placeholder="กรุณากรอกความสัมพันธ์" value="" >
                                        <label for="floatingInputGrid">ความสัมพันธ์กับเจ้าของบ้าน</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="number" class="form-control" id="age${i}" name="age${i}" required>
                                        <label for="floatingInputGrid">อายุ</label>
                                    </div>
                                </div>
                                <div class="col-md top2 center">
                                    <label for="">ความพิการทางร่างกายและสติปัญญา</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="desibled${i}${i}" name="desibled${i}" required
                                            value="1">
                                        <label class="form-check-label" for="inlineRadio1">ใช่</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="desibled${i}${b=i+1}" name="desibled${i}" required
                                            value="2">
                                        <label class="form-check-label" for="inlineRadio2">ไม่ใช่</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2 top1 left">
                                <h5>รายได้เฉลี่ยต่อเดือนแยกตามประเภท (บาท/เดือน)</h5>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mony${i}${i}" name="mony${i}${i}" required
                                            placeholder="กรุณากรอกชื่อ">
                                        <label for="floatingInputGrid">ค่าจ้างเงินเดือน</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mony${i}${b=i+1}" name="mony${i}${b=i+1}" required
                                            placeholder="กรุณากรอกนามสกุล">
                                        <label for="floatingInputGrid">ประกอบอาชีพทางการเกษตร(หลังหักค่าใช้จ่าย)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mony${i}${b=i+2}" name="mony${i}${b=i+2}" required
                                            placeholder="x-xxxxx-xxxxx-xx-x" value="">
                                        <label for="floatingInputGrid">ธุรกิจส่วนตัว(หลังหักค่าใช้จ่าย)</label>
                                    </div>
                                </div>

                            </div>
                            <div class="row g-2 top1 left">
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mony${i}${b=i+3}" name="mony${i}${b=i+3}" required
                                            placeholder="x-xxxxx-xxxxx-xx-x" value="">
                                        <label
                                            for="floatingInputGrid">บัตรสวัสดิการจากรัฐ/เอกชน(เงินบำนาญ,เบี้ยผู้สูงอายุ,อุดหนุนเด็กแรกเกิด,เงินคนพิการ,เงินคนจน,อื่นๆ)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mony${i}${b=i+4}" name="mony${i}${b=i+4}" required
                                            placeholder="กรุณากรอกนามสกุล">
                                        <label for="floatingInputGrid">รายได้จากแหล่งอื่น(เงินโอนจากครอบครัว,ค่าเช่าและอื่นๆ)</label>
                                    </div>
                                </div>
                                <div class="col-md">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="mony${i}${b=i+5}" name="mony${i}${b=i+5}" required
                                            placeholder="x-xxxxx-xxxxx-xx-x" value="">
                                        <label for="floatingInputGrid">รายได้รวมเฉลี่ย</label>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                }
                $("#addfamily").html(htmls);
                $("#addfamily").show();


            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#frmmain').submit(function(e) {
                $("#submit3").show();
                $("#submit2").hide();
                e.preventDefault();
                $('#submit2').attr('')
                var formData = new FormData(this);
                $.ajax({
                type:'POST',
                url: "{{ url('family')}}",
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    console.log(data);
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'บันทึกข้อมูลสำเร็จ',
                        showConfirmButton: false,
                        timer: 1500
                      });
                      $("#submit3").hide();
                      $("#submit2").show();


                },
                error: function(data){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'ไม่สามารถบันทึกข้อมูลได้! อาจป้อนข้อมูลไม่ครบหรือมีรหัสบัตรประชาชนนี้ในระบบแล้ว',
                    footer: ''
                  });
                      $("#submit3").hide();
                      $("#submit2").show();
                }
            });
        });




          });

        function autoTab(obj) {
            var pattern = new String("_-____-_____-__-_"); // กำหนดรูปแบบในนี้
            var pattern_ex = new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้
            var returnText = new String("");
            var obj_l = obj.value.length;
            var obj_l2 = obj_l - 1;
            for (i = 0; i < pattern.length; i++) {
                if (obj_l2 == i && pattern.charAt(i + 1) == pattern_ex) {
                    returnText += obj.value + pattern_ex;
                    obj.value = returnText;
                }
            }
            if (obj_l >= pattern.length) {
                obj.value = obj.value.substr(0, pattern.length);
            }
        }

    </script>
@endsection
