@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">Service Categories</h1>

    <a href="{{ route('servicecategories.create') }}" class="btn btn-success mb-3 text-white">Add </a>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Title</th>
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicecategories as $servicecategory)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($servicecategories->currentpage() - 1) * $servicecategories->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $servicecategory->title['en']  ?? '--'  }}</td>
                                <td>
                                    <div class="actions d-flex">
                                        <form class="" onclick="return myFunction();"
                                            action="{{ route('servicecategories.destroy', ['servicecategory' => $servicecategory->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('servicecategories.edit', ['servicecategory' => $servicecategory->id]) }}"
                                            class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $servicecategories->links() !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>
@endsection
