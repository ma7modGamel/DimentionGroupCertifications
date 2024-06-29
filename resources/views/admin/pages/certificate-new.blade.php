@extends('admin.layouts.dashbord')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Certificate</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header ">
                        <h3 class="card-title" style="width: 100%;">
                          Certificate
                    
                        </h3>
                    </div>
                    <div class="row">

                    <div class="col-md-12 col-12" style="text-align: center;">
                        <iframe style="width: 90%;height: 550px;" id="iframeViewer" src="/certificates/viewer?student_name=Student%20Name&student_name_font_size=40&student_name_font_color=000000&student_name_x=220&student_name_y=220&student_national_number=123456789&student_national_number_font_size=40&student_national_number_font_color=000000&student_national_number_x=285&student_national_number_y=295&student_nationality=Nationality&student_nationality_font_size=40&student_nationality_font_color=000000&student_nationality_x=285&student_nationality_y=295&qr_x=220&qr_y=220&qr_size=60" ></iframe>
                     </div>


                    <div class="col-md-12 col-12">

                        <div class="card-body">
                                     <div class="row">

                                <div class="col-md-6 col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Theme Title</label>
                                <input required type="text" value="Theme Title" name="theme_title" id="theme_title" class="form-control"
                                     placeholder="Theme Title">
                                     
                                     
                            </div>
                            </div>
                         <div class="col-md-6 col-6">
                             <div class="form-group">
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="page" id="flexRadioDefault1" checked value="portrait">
                              <label class="form-check-label" for="flexRadioDefault1">
                                Portrait
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="radio" name="page" id="flexRadioDefault2" value="landscape">
                              <label class="form-check-label" for="flexRadioDefault2">
                                Landscape
                              </label>
                            </div>
                            </div>
                            </div>
                            </div>
                        <form action="/certificates/import-bg-certificates" method="POST"  enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                            <label for="exampleInputFile">File input</label>
                            <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <button  type="submit" class="input-group-text">Upload</button>
                            </div>
                            </div>
                        </div>
                        </form>

                            <form class="form " >
                            <div class="row">

                                <div class="col-md-3 col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Student Name</label>
                                        <input required type="text" value="Student Name" name="student_name" id="student_name" class="form-control"
                                             placeholder="Student Name">
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Font size</label>
                                        <input required type="number" value="40" name="student_name_font_size"  id="student_name_font_size" class="form-control"
                                             placeholder="40">
                                    </div>
                                </div>
                                <div class="col-md-1 col-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Font color</label>
                                        <input type="color" id="student_name_font_color" name="student_name_font_color"  class="form-control" value="#000"><br><br>

                                    
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postion x</label>
                                        <input required type="number" name="student_name_x" class="form-control"
                                            id="student_name_x" value="220" placeholder="220">
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postion y</label>
                                        <input required type="number" name="student_name_y" class="form-control" 
                                            id="student_name_y" value="220" placeholder="220">
                                    </div>
                                </div>
                                
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="student_name_align">Align</label>
                                        <select name="student_name_align"  id="student_name_align" class="form-control" required>
                                             <option value="right">Right</option>
                                            <option value="left">Left</option>
                                            <option value="center">Center</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-3 col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Student National Number</label>
                                        <input required type="number"  value="123456789" id="student_national_number"  name="student_national_number" class="form-control"
                                            placeholder="Student National Number">
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Font size</label>
                                        <input required type="number" value="40" id="student_national_number_font_size" name="student_national_number_font_size" class="form-control"
                                            placeholder="40">
                                    </div>
                                </div>
                                <div class="col-md-1 col-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Font color</label>
                                        <input required type="color" id="student_national_number_font_color"  name="student_national_number_font_color" class="form-control"
                                            placeholder="#000">
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postion x</label>
                                        <input required type="number"  id="student_national_number_x"   value="285" name="student_national_number_x" class="form-control"
                                             placeholder="285">
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postion y</label>
                                        <input required type="number"  id="student_national_number_y" value="295" name="student_national_number_y" class="form-control"
                                             placeholder="295">
                                    </div>
                                </div>
                                
                                       
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="student_national_number_align">Align</label>
                                        <select name="student_national_number_align"  id="student_national_number_align" class="form-control" required>
                                             <option value="right">Right</option>
                                            <option value="left">Left</option>
                                            <option value="center">Center</option>
                                          </select>
                                    </div>
                                </div>
                            </div>


                        
                        <div class="row">
                        
                        <div class="col-md-3 col-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Certificate Number</label>
                                <input required type="number"  value="100000000000001" id="certificate_number"  name="certificate_number" class="form-control"
                                    placeholder="Certificate Number">
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Font size</label>
                                <input required type="number" value="40" id="certificate_number_font_size" name="certificate_number_font_size" class="form-control"
                                    placeholder="40">
                            </div>
                        </div>
                        <div class="col-md-1 col-1">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Font color</label>
                                <input required type="color" id="certificate_number_font_color"  name="certificate_number_font_color" class="form-control"
                                    placeholder="#000">
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Postion x</label>
                                <input required type="number"  id="certificate_number_x"   value="285" name="certificate_number_x" class="form-control"
                                     placeholder="285">
                            </div>
                        </div>
                        <div class="col-md-2 col-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Postion y</label>
                                <input required type="number"  id="certificate_number_y" value="295" name="certificate_number_y" class="form-control"
                                     placeholder="295">
                            </div>
                        </div>
                                       
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="certificate_number_align">Align</label>
                                        <select name="certificate_number_align"  id="certificate_number_align" class="form-control" required>
                                             <option value="right">Right</option>
                                            <option value="left">Left</option>
                                            <option value="center">Center</option>
                                          </select>
                                    </div>
                                </div>
                        </div>
<div class="row">

                                <div class="col-md-3 col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Student Nationality</label>
                                        <input required type="text"  value="Nationality" id="student_nationality"  name="student_nationality" class="form-control"
                                            placeholder="Student Nationality">
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Font size</label>
                                        <input required type="number" value="40" id="student_nationality_font_size" name="student_nationality_font_size" class="form-control"
                                            placeholder="40">
                                    </div>
                                </div>
                                <div class="col-md-1 col-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Font color</label>
                                        <input required type="color" id="student_nationality_font_color"  name="student_nationality_font_color" class="form-control"
                                            placeholder="#000">
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postion x</label>
                                        <input required type="number"  id="student_nationality_x"   value="285" name="student_nationality_x" class="form-control"
                                             placeholder="285">
                                    </div>
                                </div>
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Postion y</label>
                                        <input required type="number"  id="student_nationality_y" value="295" name="student_nationality_y" class="form-control"
                                             placeholder="295">
                                    </div>
                                </div>
                                             
                                <div class="col-md-2 col-2">
                                    <div class="form-group">
                                        <label for="student_nationality_align">Align</label>
                                        <select name="student_nationality_align"  id="student_nationality_align" class="form-control" required>
                                             <option value="right">Right</option>
                                            <option value="left">Left</option>
                                            <option value="center">Center</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                               
                                <div class="col-md-3 col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">QR size</label>
                                        <input required type="number" value="60" id="qr_size" name="qr_size" class="form-control"
                                             placeholder="60">
                                    </div>
                                </div>
                            <div class="col-md-1 col-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">QR color</label>
                                        <input type="color" id="qr_color" name="qr_color"  class="form-control" value="#000000"><br><br>

                                    
                                    </div>
                                </div>
                          
                                <div class="col-md-4 col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">QR x</label>
                                        <input required type="number"  id="qr_x"   value="220" name="qr_x" class="form-control"
                                             placeholder="220">
                                    </div>
                                </div>
                                <div class="col-md-4 col-3">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">QR y</label>
                                        <input required type="number"  id="qr_y" value="220" name="qr_y" class="form-control"
                                             placeholder="220">
                                    </div>
                                </div>
                            </div>
                            </form>
                    </div>
                    <div class="card-footer justify-content-between bg-white" style="float: right;" onclick="save()">
                        <button type="button" class="btn btn-primary">Save</button>
                      </div>

                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

{{--  --}}



<script type="text/javascript">
    var theme_title,student_name,student_name_font_size,student_name_font_color,student_name_x,student_name_y,
    student_national_number,student_national_number_font_size,student_national_number_font_color,student_national_number_x,student_national_number_y,
    student_nationality,student_nationality_font_size,student_nationality_font_color,student_nationality_x,student_nationality_y,page,
        certificate_number,certificate_number_font_size,certificate_number_font_color,certificate_number_x,certificate_number_y,
                student_name_align, student_national_number_align, student_nationality_align, certificate_number_align,


    qr_size,qr_x,qr_y,qr_color;
    function iframeLoader(){
        try{
            document.getElementById("iframeViewer").contentWindow.document.getElementById("loader").style.display =  "block";
            document.getElementById("iframeViewer").contentWindow.document.getElementById("myDiv").style.display =  "none";
        }catch(e){

        }
    }

    function URLBuild(){
         return encodeURI(`student_name_align=${student_name_align}&student_national_number_align=${student_national_number_align}&student_nationality_align=${student_nationality_align}&certificate_number_align=${certificate_number_align}&page=${page}&certificate_number=${certificate_number}&certificate_number_font_size=${certificate_number_font_size}&certificate_number_font_color=${certificate_number_font_color}&certificate_number_x=${certificate_number_x}&certificate_number_y=${certificate_number_y}&student_name=${student_name}&student_name_font_size=${student_name_font_size}&student_name_font_color=${student_name_font_color}&student_name_x=${student_name_x}&student_name_y=${student_name_y}&student_national_number=${student_national_number}&student_national_number_font_size=${student_national_number_font_size}&student_national_number_font_color=${student_national_number_font_color}&student_national_number_x=${student_national_number_x}&student_national_number_y=${student_national_number_y}&student_nationality=${student_nationality}&student_nationality_font_size=${student_nationality_font_size}&student_nationality_font_color=${student_nationality_font_color}&student_nationality_x=${student_nationality_x}&student_nationality_y=${student_nationality_y}&qr_x=${qr_x}&qr_y=${qr_y}&qr_size=${qr_size}&qr_color=${qr_color}`)
    //   return encodeURI(`student_name=${student_name}&student_name_font_size=${student_name_font_size}&student_name_font_color=${student_name_font_color}&student_name_x=${student_name_x}&student_name_y=${student_name_y}&student_national_number=${student_national_number}&student_national_number_font_size=${student_national_number_font_size}&student_national_number_font_color=${student_national_number_font_color}&student_national_number_x=${student_national_number_x}&student_national_number_y=${student_national_number_y}&qr_x=${qr_x}&qr_y=${qr_y}&qr_size=${qr_size}`)
    }

    function setData(){
        theme_title = $("#theme_title").val() 

        student_name = $("#student_name").val() 
        student_name_font_size = $("#student_name_font_size").val() || 40
        student_name_font_color = $("#student_name_font_color").val() || '#000'
        student_name_x = $("#student_name_x").val() || 220
        student_name_y = $("#student_name_y").val() || 220
        student_name_font_color = student_name_font_color.replace("#", '')


        student_national_number = $("#student_national_number").val() 
        student_national_number_font_size = $("#student_national_number_font_size").val() || 40
        student_national_number_font_color = $("#student_national_number_font_color").val() || '#000'
        student_national_number_x = $("#student_national_number_x").val() || 285
        student_national_number_y = $("#student_national_number_y").val() || 295
        student_national_number_font_color = student_national_number_font_color.replace("#", '')
        
        student_nationality = $("#student_nationality").val() 
        student_nationality_font_size = $("#student_nationality_font_size").val() || 40
        student_nationality_font_color = $("#student_nationality_font_color").val() || '#000'
        student_nationality_x = $("#student_nationality_x").val() || 295
        student_nationality_y = $("#student_nationality_y").val() || 395
        student_nationality_font_color = student_nationality_font_color.replace("#", '')
        
        
        certificate_number = $("#certificate_number").val() 
        certificate_number_font_size = $("#certificate_number_font_size").val() || 40
        certificate_number_font_color = $("#certificate_number_font_color").val() || '#000'
        certificate_number_x = $("#certificate_number_x").val() || 285
        certificate_number_y = $("#certificate_number_y").val() || 295
        certificate_number_font_color = certificate_number_font_color.replace("#", '')
        
        page = document.querySelector('input[name="page"]:checked').value || 'portrait'


        student_name_align = $("#student_name_align :selected").val() || 'right' 
        student_national_number_align  = $("#student_national_number_align :selected").val() || 'right' 
        student_nationality_align  = $("#student_nationality_align :selected").val() || 'right' 
        certificate_number_align  = $("#certificate_number_align :selected").val() || 'right' 

        qr_size = $("#qr_size").val()  || 40
        qr_x = $("#qr_x").val() || 100
        qr_y = $("#qr_y").val() || 100
        qr_color = $("#qr_color").val() || '#000'
         qr_color = qr_color.replace("#", '')

    }

    function save(){
       
        setData()
        var URL = URLBuild();
        var data = URLToArray(URL)
        data.theme_title = theme_title

        $.post("/api/certificates/store", data)
        .done(function(msg){ 
            var id = msg.data.id;
            window.location = `/certificates/edit/${id}`
            console.log(msg.data.id)
         })
        .fail(function(xhr, status, error) {
            alert("Data: " + error + "\nStatus: " + status);
        });
       
    }
    $('input[type=radio][name=page]').change(function() {
       iframeLoader()
            setData()
    
            var URL = URLBuild();
            document.getElementById('iframeViewer').src =  "/certificates/viewer?" + URL
    
    });

    $('.form :input').on('input', function() {
  
        iframeLoader()
        setData()

        var URL = URLBuild();
        document.getElementById('iframeViewer').src =  "/certificates/viewer?" + URL

   

      });


      function URLToArray(url) {
        var request = {};
        var arr = [];
        var pairs = url.substring(url.indexOf('?') + 1).split('&');
        for (var i = 0; i < pairs.length; i++) {
          var pair = pairs[i].split('=');
    
          //check we have an array here - add array numeric indexes so the key elem[] is not identical.
          if(endsWith(decodeURIComponent(pair[0]), '[]') ) {
              var arrName = decodeURIComponent(pair[0]).substring(0, decodeURIComponent(pair[0]).length - 2);
              if(!(arrName in arr)) {
                  arr.push(arrName);
                  arr[arrName] = [];
              }
    
              arr[arrName].push(decodeURIComponent(pair[1]));
              request[arrName] = arr[arrName];
          } else {
            request[decodeURIComponent(pair[0])] = decodeURIComponent(pair[1]);
          }
        }
        return request;
    }
    function endsWith(str, suffix) {
        return str.indexOf(suffix, str.length - suffix.length) !== -1;
    }
     
  </script>

  <script>
    $(function () {
      bsCustomFileInput.init();
    });
    </script>
@endsection