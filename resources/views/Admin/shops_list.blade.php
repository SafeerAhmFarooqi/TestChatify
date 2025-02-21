@include('Admin.admin_layouts.header');

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
 @include('Admin.admin_layouts.sidebar');
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
 
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">

 @include('Admin.admin_layouts.topbar');
 <div class="row">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
   @endif
</div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shops List</h4>
                        </div>
                        <Br><br>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table id="example" class="display" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>S #</th>
                                                <th>Shop Name</th>
                                                <th>Address</th>
                                                <th>Category</th>
                                                <th>Phone</th>
                                                <th>Current Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($shops as $shop)
                                            <tr>
                                                <td>{{$shop->id}}</td>
                                                <td>{{$shop->shop_name}}</td>
                                                <td>{{$shop->address}}</td>
                                                <td>{{$shop->shop_category}}</td>
                                                <td>{{$shop->phone}}</td>
                                                <td>
                                                    @if($shop->shop_status == 1)
                                                        Active
                                                    @else
                                                        De-Active    
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="shop_status/active/{{$shop->id}}" class="btn btn-success smallbtn">Active</a>
                                                    <a href="shop_status/de_active/{{$shop->id}}" class="btn btn-danger smallbtn">De-Active</a>
                                                    <a href="shop_delete/{{$shop->id}}" class="btn btn-danger smallbtn">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach       
                                        </tbody>
                                    </table>
                                </div>
            </div>
                        </div>
                    </div>





                </div>
            </div>
         
        </div>
   <?php //@include('rightside.php');?>   
    </section>
</div>

 @include('Admin.admin_layouts.footer'); 

  <script type="text/javascript">
    

    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>>