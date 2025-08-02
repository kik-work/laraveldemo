import React from "react";

function CarList({ cars, successMessage }) {
    const handleDelete = (id) => {
        if (confirm("Are you sure you want to delete this car?")) {
            fetch(`/cars/${id}`, {
                method: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
            }).then((res) => {
                if (res.ok) location.reload();
            });
        }
    };

    return (
        <div className="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-lg">
            <h1 className="text-2xl font-bold mb-6">List of Cars (React)</h1>

            {successMessage && (
                <p className="text-green-600 font-medium mb-4">
                    {successMessage}
                </p>
            )}

            <div className="overflow-x-auto">
                <table className="min-w-full border border-gray-300 rounded">
                    <thead className="bg-gray-100 text-left">
                        <tr>
                            <th className="px-4 py-2 border-b">ID</th>
                            <th className="px-4 py-2 border-b">Name</th>
                            <th className="px-4 py-2 border-b">Color</th>
                            <th className="px-4 py-2 border-b">Brand</th>
                            <th className="px-4 py-2 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {cars.map((car) => (
                            <tr
                                key={car.id}
                                className="hover:bg-gray-50 transition"
                            >
                                <td className="px-4 py-2 border-b">{car.id}</td>
                                <td className="px-4 py-2 border-b">
                                    {car.name}
                                </td>
                                <td className="px-4 py-2 border-b">
                                    {car.color}
                                </td>
                                <td className="px-4 py-2 border-b">
                                    {car.brand}
                                </td>
                                <td className="px-4 py-2 border-b space-x-2">
                                    <a
                                        href={`/cars/${car.id}/edit`}
                                        className="text-blue-600 hover:underline"
                                    >
                                        Edit
                                    </a>
                                    <button
                                        onClick={() => handleDelete(car.id)}
                                        className="text-red-600 hover:underline"
                                    >
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>

            <div className="mt-6">
                <a
                    href="/cars/create"
                    className="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                >
                    Add a New Car
                </a>
            </div>
        </div>
    );
}

export default CarList;
