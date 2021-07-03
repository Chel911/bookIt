@extends('layouts.app')
    @section('content') 
    
        <div class="container-fluid">
            <div class="row">
                @include('notes.layouts.sidebar')
                <style>
                          ::placeholder, label{
                            font-weight: 600;
                            font-size: 16px;
                            line-height: 20px;
                          }
                          .custom-checkbox {
                            position: absolute;
                            
                            }

                            .custom-checkbox-input {
                            display: none;
                            }

                            

 


                    </style>
                <div class="col">
                    <div class="container py-3">
                        <div class="d-flex flex-row">
                            <p style="font-weight:700; font-size:30px;">
                                Create new task
                            </p>  
                            <div class="ml-auto mr-0"  style="width: 45px; height:45px; border-radius:50%;background:#000;">
                                <img src="images/about_img.svg" alt="" style="max-width:100%;
                                max-height:100%; ">
                            </div>
                        </div>
                    
                        <hr style="border-top: 1px solid #00000023;">
                        <form action="{{route('tasks')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="task_name" placeholder="Task name" style="border-radius:10px; height:50px;"  autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                 
                                    <div class="col-md-4">
                                         <div class="form-group">
                                            <select class="custom-select"  name="status"   style="border-radius:10px; height:50px; ">
                                                <option  disabled="disabled" >Status</option>
                                                <option @if ($status==="not started")
                                                    selected
                                                @endif>not started</option>
                                                <option @if ($status==="in progress")
                                                selected
                                            @endif>in progress</option>
                                                <option @if ($status==="done")
                                                selected
                                            @endif>done</option>
                                             </select>
                                         
                                          </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                           <select class="custom-select"  name="importance"   style="border-radius:10px; height:50px; ">
                                               <option selected="true" disabled="disabled" >Priority</option>
                                                <option>high</option>
                                               <option>medium</option>
                                               <option>low</option>
                                                
                                           </select>
                                        
                                         </div>
                                   </div>
                                   <div class="col-md-4">
                                    <div class="form-group">
                                       <select class="custom-select"  name="book"   style="border-radius:10px; height:50px; ">
                                           <option selected="true" disabled="disabled" >Select a book</option>
                                           @foreach ($books as $book)
                                           <option>{{$book->title}}</option>  
                                         @endforeach
                                           
                                            
                                       </select>
                                    
                                     </div>
                               </div>
                                       
                                  </div>  
                                  <div class="row">

                                        <div class="col">
                                            <textarea rows="6" class=" py-4 form-control" name="description" placeholder="Task description..." style=" 
                                            border:none;
                                            background: #e9f4ff;
                                            border-radius: 10px;
                                            outline:none;
                                            padding:15px; 
                                            resize: none;"  ></textarea>
                                          </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="end_date" placeholder="Due date" onfocus="(this.type='datetime-local')" style="border-radius:10px; height:50px;" >
                                            </div>
                                        </div>
                                        <div class="col-2">
                                     

                                              <div class="form-group mt-2">
                                                <label class="custom-checkbox">
                                             
                                                    <input id="chekcbox-input" type="hidden" name="notification" value="true">
                                                    <span class="custom-checkbox-text"><img id="checkbox-img" style="cursor: pointer" src="/images/icons/alert_on_icon.svg" alt=""> &nbsp;  Alert</span>
                                                  </label>
                                              </div>
                                        </div>
                                        <div class="col-4">
                                            <select id="selectTime" class="custom-select"  name="reminder_time"   style="border-radius:10px; height:50px; " >
                                                <option selected="true" disabled="disabled" >Set due date reminder</option>
                                            
                                                <option value="300">5 Minutes before</option>  
                                                <option value="600">10 Minutes before</option>  
                                                <option value="900">15 Minutes before</option>  
                                                <option value="3600">1 Hour before</option> 
                                                <option value="7200">2 Hours before</option>  
                                                <option value="86400">1 Day before</option>
                                                <option value="172800">2 Days before</option>


                                            </select>
                                        </div>
                                    </div>
                                         
                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="button" class="btn " style="background-color: #D4E5F9; font-weight:700;"> <a href=" {{route('books')}}" style="text-decoration: none; color:#000;">Cancel</a> </button>
                                            </div>
                                            <div class="col">
                                                <button type="submit"  name="create" class="btn btn-primary float-right"
                                                style="background-color:#1F1A6B;font-weight:700;" >Add</button> 
                                            </div>
                                        </div>
                                 </form>
                                </div>
                             
                       
                              
                            
                              </div>
                      
                        
                             
                    </div>
                   
                
  
       
                </div>
  
            </div>
                        
        </div>
        <script>
              $(document).ready(function() {
                $("#checkbox-img").click(function() {
                    if ($("#chekcbox-input").val()=="true") {
                        $("#checkbox-img").attr("src","/images/icons/alert_off_icon.svg");
                       $('#selectTime').prop( "disabled", true );
                       $("#chekcbox-input").val('false')
                    } else {
                        $("#checkbox-img").attr("src","/images/icons/alert_on_icon.svg");
                        $("#chekcbox-input").val('true');
                       $('#selectTime').prop( "disabled", false );

                    }
                });
            });
        </script>
    @endsection  

  