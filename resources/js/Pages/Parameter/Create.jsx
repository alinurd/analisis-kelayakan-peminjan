// resources/js/Pages/Parameters/Create.jsx

import React from 'react';
import BtnRoot from '@/Components/BtnRoot';
import Dropdown from '@/Components/Dropdown';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
 import { Head, useForm } from '@inertiajs/react';
 export default function Create({ auth }) {
     const { data, setData, post, errors } = useForm({
        nama: '',
        // Add more fields as needed
    });

    const handleSubmit = (e) => {
        e.preventDefault();

        post(route('parameters.store'), data);
    };

    return (
        <AuthenticatedLayout
            user={auth.user}
            header={
                <div className="flex justify-between items-center">
                    <h2 className="font-semibold text-xl text-gray-800 leading-tight">Parameter</h2>
                    <BtnRoot href={route('parameters')} active={route().current('Create')}>
                        Back to List
                    </BtnRoot>
                </div>
            }> 
 

            <Head title="Create Parameter" /> 

            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div className="p-6 text-gray-900">
                            <form onSubmit={handleSubmit}>
                                <div className="mb-4">
                                    <label htmlFor="name" className="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                                    <input
                                        type="text"
                                        id="name"
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
                                <Dropdown>
                                    <Dropdown.Trigger>
                                        <span className="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                className="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150"
                                            >
 
                                                <svg
                                                    className="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fillRule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clipRule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </Dropdown.Trigger>

                                    <Dropdown.Content>
                                        <Dropdown.Link href={route('profile.edit')}>Profile</Dropdown.Link>
                                        <Dropdown.Link href={route('logout')} method="post" as="button">
                                            Log Out
                                        </Dropdown.Link>
                                    </Dropdown.Content>
                                </Dropdown>                                {/* Add more form fields as needed */}
                                <div>
                                    <button type="submit" className="bg-blue-500 text-white px-4 py-2 rounded">Create Parameter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
}
