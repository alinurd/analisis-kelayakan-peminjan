import BtnRoot from '@/Components/BtnRoot';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, } from '@inertiajs/react';
import { Inertia } from '@inertiajs/inertia';
import React, { useEffect } from 'react';
import { Transition } from '@headlessui/react';

  export default function Parameter(props) {
      const { message, auth, parameters, title, response } = props;
  
    
const handleUpdate = (parameterId) => {
        Inertia.visit(route('parameters.edit', parameterId));
}
     const handleDelete = (parameterId) => {
         Inertia.delete(`/parameters/${parameterId}`)
             .then((response) => {
                 console.log('Parameter deleted successfully');
                 // Optionally, update the UI or perform additional actions
             })
             .catch((error) => {
                 console.error('Error deleting parameter', error);
                 // Handle the error
             });
     };


      
    return (
        
        <AuthenticatedLayout
            user={auth.user}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">Parameter</h2>
                    
                    <Transition
                        show={true}
                        enter="transition ease-in-out"
                        enterFrom="opacity-0"
                        leave="transition ease-in-out"
                        leaveTo="opacity-0"
                    >
                        <p className="text-sm text-gray-600">{response}</p>
                    </Transition>
                    <BtnRoot href={route('parameters.create')} active={route().current('parameters.create')}>
                        Create
                    </BtnRoot>
                </div>
    }>
            <Head title={title} />

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <p>{message}</p>
                        </div>
                    </div>
                </div>
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode</th>
                                        <th>Name</th>
                                        <th>created_at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {Object.keys(parameters).map((key) => (
                                        <tr key={parameters[key].id}>
                                            <td>{parameters[key].id}</td>
                                            <td>{parameters[key].kode}</td>
                                            <td>{parameters[key].nama}</td> {/* Adjusted from 'jenis' to 'name' */}
                                            <td>{parameters[key].created_at}</td>
                                            <td>
                                                <button onClick={() => handleUpdate(parameters[key].id)}>Update</button>
                                                <button onClick={() => handleDelete(parameters[key].id)}>Delete</button>
                                            </td>
                                        </tr>
                                    ))}
                                </tbody>
                            </table>

                         </div>
                    </div>
                </div>
                
            </div>
            <div className="py-12">
                
            </div>
        </AuthenticatedLayout>
    );
}
