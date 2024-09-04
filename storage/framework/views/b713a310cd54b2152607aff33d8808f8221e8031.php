<?php use App\MyHelpers;use Illuminate\Support\Facades\Auth; ?>

<?php $__env->startSection('PageTitle', 'Vendors'); ?>
<?php $__env->startSection('content'); ?>
    <!--breadcrumb -->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Vendor</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="dashboard"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Vendor List</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb -->

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="data_table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joined Date</th>
                        <th>Status</th>
                        <th>View Details</th>
                        <th>Activate</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->email); ?></td>
                            <td><?php echo e(MyHelpers::getDiffOfDate($item->created_at)); ?></td>
                            
                            <td>
                                <?php if($item->status): ?>
                                    <div class="badge rounded-pill bg-light-success text-success w-100">active</div>
                                <?php else: ?>
                                    <div class="badge rounded-pill bg-light-danger text-danger w-100">Not active</div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm radius-30 px-4"
                                        data-bs-toggle="modal"
                                        data-bs-target="#exampleVerticallycenteredModal-<?php echo e($item->id); ?>">View
                                    Details
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleVerticallycenteredModal-<?php echo e($item->id); ?>" tabindex="-1"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Vendor Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?php echo e(url('uploads/images/profile/' . $item->photo)); ?>"
                                                     class="card-img-top" style="max-width: 300px; margin-left:
                                                         10px">
                                                <div class="card-body">
                                                    <h5 class="card-title">Name : <span style="font-weight:
                                                         lighter"><?php echo e($item->name); ?></span>
                                                    </h5>
                                                    <h5 class="card-title">Email : <span style="font-weight:
                                                         lighter"><?php echo e($item->email); ?></span>
                                                    </h5>
                                                    <h5 class="card-title">Username : <span style="font-weight:
                                                         lighter"><?php echo e($item->username); ?></span>
                                                    </h5>
                                                    <h5 class="card-title">Address : <span style="font-weight:
                                                         lighter"><?php echo e($item->address ?  : 'No address
                                                         '); ?></span>
                                                    </h5>
                                                    <h5 class="card-title">Phone Number : <span style="font-weight:
                                                         lighter"><?php echo e($item->phone_number ? : 'No phone number'); ?></span>
                                                    </h5>
                                                    <h5 class="card-title">Status : <span style="font-weight:
                                                         lighter">
                                                            <?php if($item->status): ?>
                                                                <span style="color: lime">active</span>
                                                            <?php else: ?>
                                                                <span style="color: red">Not active</span>
                                                            <?php endif; ?>
                                                        </span>
                                                    </h5>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <form method="POST" action="<?php echo e(route('admin-activate-vendor')); ?>"
                                      class="active-deactive-form">
                                    <?php echo csrf_field(); ?>
                                    <input name="vendor_id" value="<?php echo e($item->id); ?>" hidden/>
                                    <input name="current_status" value="<?php echo e($item->status); ?>" hidden/>
                                    <div class="form-check form-switch">
                                        <?php if($item->status): ?>
                                            <input name="de_activate" class="btn
                                            btn-outline-danger" type="submit"
                                                   value="De-Active">
                                        <?php else: ?>
                                            <input name="activate" class="btn
                                            btn-outline-success" type="submit"
                                                   value=" Activate ">
                                        <?php endif; ?>

                                    </div>
                                </form>
                            </td>
                            <td>
                                <div class="d-flex order-actions">
                                    <a href="" class="ms-3" data-bs-toggle="modal"
                                       data-bs-target="#exampleDangerModal-<?php echo e($item->id); ?>">

                                        <i class='bx bxs-trash'></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('plugins'); ?>
    <link href="<?php echo e(asset('backend_assets')); ?>/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet"/>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('backend_assets')); ?>/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo e(asset('backend_assets')); ?>/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            var table = $('#data_table').DataTable({
                lengthChange: true,
                buttons: ['excel', 'pdf', 'print']
            });

            table.buttons().container()
                .appendTo('#data_table_wrapper .col-md-6:eq(0)');
        });
    </script>

    <script src="sweetalert2.all.min.js"></script>



    <?php $__env->startSection('AjaxScript'); ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
                integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('js'); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#brand_image').change(function (e) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#show_image').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('form.active-deactive-form').click('submit', function (event) {
                    event.preventDefault();
                    $.ajax({
                        url: "<?php echo e(route('admin-activate-vendor')); ?>",
                        method: 'POST',
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function (response) {
                            Swal.fire({
                                icon: 'success',
                                title: response.msg,
                                showDenyButton: false,
                                showCancelButton: false,
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                window.location.reload();
                            });
                        },
                        error: function (response) {

                        }
                    });
                });
            });
        </script>
    <?php $__env->stopSection(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\vendor-eCommerce\resources\views/backend/admin/all_vendors.blade.php ENDPATH**/ ?>