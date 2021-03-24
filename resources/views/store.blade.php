@extends('master')
@section('title', 'แบบสำรวจร้านค้า')
@section('contact')
<form action="{{ url('save') }}" id="frmmain" name="frmmain" enctype="multipart/form-data" method="post">
    <div class="container center">

        <h1 class="title">แบบสำรวจร้านค้า</h1>
        <span>ตำบลรวมไทยพัฒนา อำเภอพบพระ จังหวัดตาก 63160</span>

        <div class="row g-2 top left">
            <h5>ที่อยู่</h5>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="no" name="no" required placeholder="กรุณากรอกบ้านเลขที่">
                    <label for="no">บ้านเลขที่</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="soy" name="soy" placeholder="กรุณากรอกซอย" required>
                    <label for="soy">ซอย</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <input type="text" class="form-control" id="road" name="road" placeholder="ถนน" required>
                    <label for="road">ถนน</label>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-floating">
                    <select class="form-select" id="moo" name="moo" aria-label="Floating label select example" required>
                        <option selected disabled value="">หมู่ที่</option>
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

        </div>
        <div class="row g-2 top1 left">
            <h5>ชื่อร้านค้า</h5>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="store" name="store" value="" placeholder="กรุณากรอกชื่อ" required>
                    <label for="store">ชื่อร้าน</label>
                </div>
            </div>
            <div class="col-md-6 left top1">

            </div>
            <h5>ข้อมูลเจ้าของร้าน</h5>
            <div class="col-md">

                <div class="form-floating">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="" placeholder="กรุณากรอกชื่อ" required>
                    <label for="fristname">ชื่อเจ้าของร้าน</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="กรุณากรอกนามสกุล" required>
                    <label for="lastname">นามสกุล</label>
                </div>
            </div>
            <div class="col-md">
                <div class="form-floating">
                    <input type="text" class="form-control" id="tel" name="tel" placeholder="กรุณากรอกนามสกุล" required>
                    <label for="tel">เบอร์โทร</label>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="d-flex justify-content-between">
                <div class="flexSizeA"></div>
                <div class="flexSizeA">
                    <div class="col-md-12 top center">
                        <label for="formGroupExampleInput" class="form-label"><strong>รูปถ่ายนอกที่พักอาศัย</strong>
                        </label>
                        <div class="input-group col-mb-3">
                            <input type="file" class="form-control" id="pic" name="pic" required>
                            <label class="input-group-text" for="pic">Upload</label>
                        </div>
                    </div>
                </div>
                <div class="flexSizeA"></div>

            </div>

        </div>
        <button type="submit" class="btn btn-primary active top " data-bs-toggle="submit" id="submit2" autocomplete="off"
            aria-pressed="true"><i class="fa fa-floppy-o fa-lg" aria-hidden="true"></i> บันทึกข้อมูล</button>
        <button type="button" class="btn btn-primary active top " data-bs-toggle="submit" id="submit3" autocomplete="off"
            disabled aria-pressed="true"><i class="fa fa-spinner fa-pulse fa-fw"></i>
            <span class="sr-only">Loading...</span> กำลังบันทึกข้อมูล</button>
        <button type="reset" class="btn btn-warning active top " data-bs-toggle="reset" id="reset" autocomplete="off"
            aria-pressed="true"><i class="fa fa-refresh" aria-hidden="true"></i> เริ่มฟอร์มใหม่</button>
    </div>
</form>
    <script>
        $(document).ready(function() {
            $("#submit3").hide();
                        $("#submit2").show();
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
                            type: 'POST',
                            url: "{{ url('store') }}",
                            data: formData,
                            cache: false,
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
                            error: function(data) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'ไม่สามารถบันทึกข้อมูลได้! อาจป้อนข้อมูลไม่ครบหรือมีรหัสบัตรประชาชนนี้ในระบบแล้ว',
                                    footer: 'อาจป้อนข้อมูลไม่ครบ'
                                });
                                $("#submit3").hide();
                                $("#submit2").show();
                            }
                        });
                    });});

    </script>
@endsection
