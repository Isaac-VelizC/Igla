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
            <h2>Todos los usuarios del sistema</h2>
          </div>
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->
    <div class="row">
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon purple">
            <i class="lni lni-users"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">Todos los Usuarios</h6>
            <h3 class="text-bold mb-10">107</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon success">
            <i class="lni lni-user"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">Estudiantes</h6>
            <h3 class="text-bold mb-10">100</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon primary">
            <i class="lni lni-chef-hat"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">Chefs</h6>
            <h3 class="text-bold mb-10">3</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
      <div class="col-xl-3 col-lg-4 col-sm-6">
        <div class="icon-card mb-30">
          <div class="icon orange">
            <i class="lni lni-library"></i>
          </div>
          <div class="content">
            <h6 class="mb-10">Materias</h6>
            <h3 class="text-bold mb-10">34567</h3>
          </div>
        </div>
        <!-- End Icon Cart -->
      </div>
      <!-- End Col -->
    </div>
      <div class="col-lg-7">
        <div class="card-style mb-30">
          <div class="title d-flex flex-wrap align-items-center justify-content-between">
            <div class="left">
              <h6 class="text-medium mb-30">Sales History</h6>
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
                <tr>
                  <td>
                    <div class="product">
                      <div class="image">
                        <img src="assets/images/products/product-mini-3.jpg" alt="" />
                      </div>
                      <p class="text-sm">Sofa</p>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm">Interior</p>
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
                <tr>
                  <td>
                    <div class="product">
                      <div class="image">
                        <img src="assets/images/products/product-mini-4.jpg" alt="" />
                      </div>
                      <p class="text-sm">Kitchen</p>
                    </div>
                  </td>
                  <td>
                    <p class="text-sm">Interior</p>
                  </td>
                  <td>
                    <p class="text-sm">$345</p>
                  </td>
                  <td>
                    <span class="status-btn close-btn">Canceled</span>
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
