import React from "react"; 
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Transition } from '@headlessui/react';

import { Head, } from '@inertiajs/react';
import { Inertia } from '@inertiajs/inertia';
import BtnRoot  from '@/Components/BtnRoot';

// ... rest of your code



export default function Module(props){
    const { response, auth, title, message, modules }=props;
    const handleUpdate = (parameterId) => {
        Inertia.visit(route('modules.edit', parameterId));
    }
    const handleDelete = (parameterId) => {
        Inertia.delete(`/modules/${parameterId}`)
            .then((response) => {
                console.log('Parameter deleted successfully');
                // Optionally, update the UI or perform additional actions
            })
            .catch((error) => {
                console.error('Error deleting parameter', error);
                // Handle the error
            });
    };
   return(
       <AuthenticatedLayout
           user={auth.user}
           header={
               <div className="flex justify-between items-center">
                   <h2 className="font-semibold text-xl text-gray-800 leading-tight">{title}</h2>
                   <Transition
                       show={true}
                       enter="transition ease-in-out"
                       enterFrom="opacity-0"
                       leave="transition ease-in-out"
                       leaveTo="opacity-0"
                   >
                       <p className="text-sm text-gray-600">{response}</p>
                   </Transition>
                   <BtnRoot href={route('modules.create')} active={route().current('modules.create')}>
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
                                       <th>Controllers</th>
                                       <th>Routes</th>
                                       <th>Title</th>
                                       <th>created_at</th>
                                       <th>Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   {Object.keys(modules).map((key) => (
                                       <tr key={modules[key].id}>
                                           <td>{modules[key].id}</td>
                                           <td>{modules[key].controller}</td>
                                           <td>{modules[key].route}</td>  
                                           <td>{modules[key].title}</td>  
                                           <td>{modules[key].created_at}</td>
                                           <td>
                                               <button onClick={() => handleUpdate(modules[key].id)}>Update</button>
                                               <button onClick={() => handleDelete(modules[key].id)}>Delete</button>
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
   )
}
