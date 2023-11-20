// resources/js/Pages/Parameters/Edit.jsx

import React from 'react';
import BtnRoot from '@/Components/BtnRoot';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Head, useForm } from '@inertiajs/react';

export default function Edit({ auth, parameter }) {
    const { data, setData, put, errors } = useForm({
        nama: parameter.nama,
        kode: parameter.kode,
        jenis: parameter.jenis,
        // Add more fields as needed
    });

    const handleSubmit = (e) => {
        e.preventDefault();

        put(route('parameters.update', parameter.id), data);
    };
    // console.log(data)

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">Edit Parameter</h2>
                    <BtnRoot href={route('parameters')} active={route().current('Edit')}>
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
                                    <label htmlFor="nama" className="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                    <input
                                        type="text"
                                        id="nama"
                                        name="nama"
                                        value={data.nama}
                                        onChange={(e) => setData('nama', e.target.value)}
                                        className={`form-input ${errors.nama ? 'border-red-500' : ''}`}
                                    />
                                    {errors.nama && <p className="text-red-500 text-xs mt-1">{errors.nama}</p>}
                                </div>
                                <div className="mb-4">
                                    <label htmlFor="kode" className="block text-gray-700 text-sm font-bold mb-2">Kode:</label>
                                    <input
                                        type="text"
                                        id="kode"
                                        name="kode"
                                        value={data.kode}
                                        onChange={(e) => setData('kode', e.target.value)}
                                        className={`form-input ${errors.kode ? 'border-red-500' : ''}`}
                                    />
                                    {errors.kode && <p className="text-red-500 text-xs mt-1">{errors.kode}</p>}
                                </div>
                                <div className="mb-4">
                                    <label htmlFor="jenis" className="block text-gray-700 text-sm font-bold mb-2">Jenis:</label>
                                    <input
                                        type="text"
                                        id="jenis"
                                        name="jenis"
                                        value={data.jenis}
                                        onChange={(e) => setData('jenis', e.target.value)}
                                        className={`form-input ${errors.jenis ? 'border-red-500' : ''}`}
                                    />
                                    {errors.jenis && <p className="text-red-500 text-xs mt-1">{errors.jenis}</p>}
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
