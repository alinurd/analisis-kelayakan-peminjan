// resources/js/Pages/Parameters/Edit.jsx

import React from 'react';
import BtnRoot from '@/Components/BtnRoot';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';

export default function Edit({ auth, modules }) {
    const { data, setData, put, errors } = useForm({
        controller: modules.controller,
        title: modules.title,
        route: modules.route, 
        // Add more fields as needed
    });
    console.log(modules)
    const handleSubmit = (e) => {
        e.preventDefault();

        put(route('modules.update', modules.id), data);
    };
    // console.log(data)

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">Edit Parameter</h2>
                    <BtnRoot href={route('modules')} active={route().current('Edit')}>
                        Back to List
                    </BtnRoot>
                </div>
            }
        >
            <Head title="Edit Parameter" />
            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <form onSubmit={handleSubmit}>
                                {/* Form fields for updating the parameter */}
                                {/* Similar to the create form, adjust as needed */}
                                <div className="mb-4">
                                    <label htmlFor="controller" className="block text-gray-700 text-sm font-bold mb-2">controller:</label>
                                    <input
                                        type="text"
                                        id="controller"
                                        name="controller"
                                        value={data.controller}
                                        onChange={(e) => setData('controller', e.target.value)}
                                        className={`form-input ${errors.controller ? 'border-red-500' : ''}`}
                                    />
                                    {errors.controller && <p className="text-red-500 text-xs mt-1">{errors.controller}</p>}
                                </div>
                                <div className="mb-4">
                                    <label htmlFor="route" className="block text-gray-700 text-sm font-bold mb-2">Route:</label>
                                    <input
                                        type="text"
                                        id="route"
                                        name="route"
                                        value={data.route}
                                        onChange={(e) => setData('route', e.target.value)}
                                        className={`form-input ${errors.route ? 'border-red-500' : ''}`}
                                    />
                                    {errors.route && <p className="text-red-500 text-xs mt-1">{errors.route}</p>}
                                </div>
                                <div className="mb-4">
                                    <label htmlFor="title" className="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                                    <input
                                        type="text"
                                        id="title"
                                        name="title"
                                        value={data.title}
                                        onChange={(e) => setData('title', e.target.value)}
                                        className={`form-input ${errors.title ? 'border-red-500' : ''}`}
                                    />
                                    {errors.title && <p className="text-red-500 text-xs mt-1">{errors.title}</p>}
                                </div>
                                {/* Add more form fields as needed */}
                                <div>
                                    <button type="submit" className="bg-blue-500 text-white px-4 py-2 rounded">Update Parameter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
