@extends('layouts.masterdashboard')
@section('dashboard_body')
<div class="container my-32pt">
    <div class="row my-32pt">
        <div class="col-lg-12 d-flex align-items-center">
            <div class="flex" style="max-width: 100%">

                <div class="card m-0">

                    <div class="table-responsive" data-toggle="lists" data-lists-sort-by="js-lists-values-employee-name" data-lists-values="[&quot;js-lists-values-employee-name&quot;, &quot;js-lists-values-employer-name&quot;, &quot;js-lists-values-projects&quot;, &quot;js-lists-values-activity&quot;, &quot;js-lists-values-earnings&quot;]">

                        <table class="table mb-0 thead-border-top-0 table-nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 37px;">ID</th>
                                    <th style="width: 37px;">Category Name</th>
                                    <th style="width: 37px;">Category Slug</th>
                                    <th style="width: 37px;">Status</th>
                                    <th style="width: 37px;">Action</th>

                                </tr>
                            </thead>
                            <tbody class="list" id="toggle">




                                @forelse ($categories as $category)
                                    <tr>
                                        <td class="text-50 js-lists-values-activity small">{{ $loop->index+1 }}</td>
                                        <td class="text-50 js-lists-values-activity small">{{ $category->category_name }}</td>
                                        <td class="text-50 js-lists-values-activity small">{{ $category->category_slug }}</td>
                                        <td class="text-50 js-lists-values-activity small">
                                            @if ($category->status == 'active')
                                                <span style="font-size: 14px" class="badge text-white bg-primary">{{ $category->status }}</span>
                                            @else
                                                <span style="font-size: 14px" class="badge text-white  bg-danger">{{ $category->status }}</span>
                                            @endif

                                        </td>
                                        <td class="text-50 js-lists-values-activity small d-flex justify-content-start align-item-center">
                                            <a href="{{ Route('category.edit',$category->id) }}" style="color:rgb(0, 209, 216);font-size:16px;display:inline-block;margin-right:10px"> <i class="fas fa-edit"></i> </a>
                                            <form action="{{ route('category.destroy',$category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                 <button class="delete" type="submit" style="background: transparent;border:none;color:red;font-size:16px">
                                                     <i class="fas fa-trash-alt"></i> </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" >
                                            <p class="bg-danger text-white text-center py-2">Here is no category yet!</strong>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script_body')

<script>
    $(document).ready(function(){
        $('.delete').click(function(e){

            var form =  $(this).closest("form");
            e.preventDefault();

            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
            }
            })
        })
    })
</script>

<script>
    @if(session('session'))

    $(document).ready(function(){

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        background:'#00BCC2',
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })

        Toast.fire({
        icon: 'success',
        title: '{{ session('session') }}'
        })

    })
@endif
</script>
@endsection
