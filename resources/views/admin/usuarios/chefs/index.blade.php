@extends('layouts.app')

@section('content')
<!-- ========== section start ========== -->
<section class="section">
  <div class="container-fluid">
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="title">
            <h2>CHEFS</h2>
          </div>
        </div>
        <!-- end col -->
        <div class="col-md-6">
          <div class="breadcrumb-wrapper">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="#0">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                  eCommerce
                </li>
              </ol>
            </nav>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
      <div class="col-lg-12">
        <div class="card-style mb-30">
          <div class="title d-flex flex-wrap align-items-center justify-content-between">
            <div class="left">
              <h6 class="text-medium mb-30">Lista de Chefs</h6>
            </div>
            <div class="right">
              <div class="select-style-1">
                <div class="select-position select-sm">
                  <select class="light-bg">
                    <option value="">Today</option>
                    <option value="">Yesterday</option>
                  </select>
                </div>
              </div>
              <!-- end select -->
            </div>
          </div>
          <!-- End Title -->
          <div class="table-responsive">
            <table class="table top-selling-table">
              <thead>
                <tr>
                  <th>
                    <h6 class="text-sm text-medium">Products</h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Category <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Revenue <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th class="min-width">
                    <h6 class="text-sm text-medium">
                      Status <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                  <th>
                    <h6 class="text-sm text-medium text-end">
                      Actions <i class="lni lni-arrows-vertical"></i>
                    </h6>
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($chefs as $chef)
                <tr>
                  <td>
                    <div class="product">
                      <div class="image">
                        <img src="assets/images/products/product-mini-3.jpg" alt="" />
                      </div>
                      <p class="text-sm">{{$chef->name}}</p>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm">{{$chef->email}}</p>
                  </td>
                  <td>
                    <p class="text-sm">$345</p>
                  </td>
                  <td>
                    <span class="status-btn success-btn">Completed</span>
                  </td>
                  <td>
                    <div class="action justify-content-end">
                      <button class="edit">
                        <i class="lni lni-pencil"></i>
                      </button>
                      <button class="more-btn ml-10 dropdown-toggle" id="moreAction1" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="lni lni-more-alt"></i>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreAction1">
                        <li class="dropdown-item">
                          <a href="#0" class="text-gray">Remove</a>
                        </li>
                        <li class="dropdown-item">
                          <a href="#0" class="text-gray">Edit</a>
                        </li>
                      </ul>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table -->
          </div>
        </div>
      </div>
  </div>
  <!-- end container -->
</section>
<!-- ========== section end ========== -->
@endsection
