import { router } from '@inertiajs/react';
import React, { useState } from 'react';

const EmployeeList = ({ showdatabase, query }) => {
    const [search, setSearch] = useState(query || '');

    const handleSearch = (e) => {
        e.preventDefault();
        router.get('/showdatabase', { search });
    };

    return (
        <div className='min-h-screen bg-gradient-to-b from-green-100 to-green-300 flex flex-col items-center p-6'>
            <h1 className='text-4xl font-bold text-green-800 mb-8 drop-shadow-lg'>Tawanna Hotel</h1>

            <form onSubmit={handleSearch} className='w-full max-w-lg flex gap-3 mb-8'>
                <input
                    type='text'
                    className='flex-grow p-3 border border-green-500 rounded-xl focus:outline-none focus:ring-4 focus:ring-green-400 shadow-sm placeholder-gray-500'
                    placeholder='Search Hotel Customer...'
                    value={search}
                    onChange={(e) => setSearch(e.target.value)}
                />
                <button
                    type='submit'
                    className='px-5 py-3 bg-green-600 text-white rounded-xl font-semibold hover:bg-green-700 transition-all duration-300 shadow-md'>
                    Search
                </button>
            </form>

            <div className='w-full max-w-5xl overflow-x-auto bg-white shadow-lg rounded-xl'>
                <table className='w-full border-collapse text-gray-700'>
                    <thead>
                        <tr className='bg-green-700 text-white text-left'>
                            <th className='p-4 border'>ID</th>
                            <th className='p-4 border'>Name</th>
                            <th className='p-4 border'>Email</th>
                            <th className='p-4 border'>Phone Number</th>
                            <th className='p-4 border'>Address</th>
                            <th className='p-4 border'>ID Card Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        {showdatabase.data.length === 0 ? (
                            <tr>
                                <td colSpan='6' className='text-center p-6 text-gray-500 font-medium'>
                                    No records found
                                </td>
                            </tr>
                        ) : (
                            showdatabase.data.map((employee, index) => (
                                <tr key={index} className='even:bg-gray-50 hover:bg-green-100 transition-all duration-200'>
                                    <td className='p-4 border text-center font-medium'>{employee.hotel_customer_id}</td>
                                    <td className='p-4 border'>{employee.name}</td>
                                    <td className='p-4 border'>{employee.email}</td>
                                    <td className='p-4 border'>{employee.phone}</td>
                                    <td className='p-4 border'>{employee.address}</td>
                                    <td className='p-4 border'>{employee.passport_number}</td>
                                </tr>
                            ))
                        )}
                    </tbody>
                </table>
            </div>
        </div>
    );
};

export default EmployeeList;
