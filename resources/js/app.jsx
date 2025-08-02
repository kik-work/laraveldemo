import React from "react";
import '../css/app.css';
import ReactDOM from "react-dom/client";
import CarList from "./components/CarList";

const rootEl = document.getElementById("react-car-list");

if (rootEl) {
    const cars = JSON.parse(rootEl.dataset.cars);
    const success = rootEl.dataset.success;

    ReactDOM.createRoot(rootEl).render(
        <CarList cars={cars} successMessage={success} />
    );
}
