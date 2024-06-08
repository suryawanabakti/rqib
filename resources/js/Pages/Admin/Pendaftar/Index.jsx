import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import {
    IconBook2,
    IconList,
    IconPencil,
    IconUsers,
} from "@tabler/icons-react";
import { useState } from "react";
import { Button } from "react-bootstrap";
import Modal from "react-bootstrap/Modal";
export default function Index({ auth, pendaftar }) {
    const header = (
        <div className="row g-2 align-items-center">
            <div className="col">
                {/* Page pre-title */}
                <div className="page-pretitle">Overview</div>
                <h2 className="page-title">Pendaftar</h2>
            </div>
            {/* Page title actions */}
            <div className="col-auto ms-auto d-print-none">
                <div className="btn-list"></div>
            </div>
        </div>
    );

    const [show, setShow] = useState(false);

    const handleClose = () => setShow(false);
    const [nama, setNama] = useState("");

    const handleShow = (data) => {
        setData("pendaftar_id", data.id);
        setNama(data.name);
        setShow(true);
    };
    const { data, setData, errors, processing, post } = useForm({
        pendaftar_id: "",
        nis: "",
    });

    const submit = (e) => {
        e.preventDefault();
        post(route("admin.pendaftar.diterima", data.pendaftar_id), {
            onSuccess: () => setShow(false),
        });
    };
    return (
        <AuthenticatedLayout user={auth.user} header={header}>
            <Head title="Pendaftar" />

            <div className="card">
                <table className="table card-table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {pendaftar.data.map((data) => {
                            return (
                                <tr key={data.id}>
                                    <td>{data.name}</td>
                                    <td>{data.nik}</td>
                                    <td>{data.dob}</td>
                                    <td className="d-flex gap-2">
                                        <Button
                                            variant="outline"
                                            size="sm"
                                            onClick={() => handleShow(data)}
                                        >
                                            Terima
                                        </Button>
                                    </td>
                                </tr>
                            );
                        })}
                    </tbody>
                </table>
            </div>
            <Modal show={show} onHide={handleClose}>
                <Modal.Header closeButton>
                    <Modal.Title>Terima Pendaftar</Modal.Title>
                </Modal.Header>
                <form onSubmit={submit}>
                    <Modal.Body>
                        <div className="mb-3">
                            <label htmlFor="" className="form-label">
                                Nama
                            </label>
                            <input
                                type="text"
                                className="form-control"
                                value={nama}
                                readOnly
                            />
                        </div>
                        <div className="mb-3">
                            <label htmlFor="" className="form-label">
                                NIS
                            </label>
                            <input
                                onChange={(e) => setData("nis", e.target.value)}
                                type="text"
                                className="form-control"
                                placeholder="Masukkan NIS"
                            />
                        </div>
                    </Modal.Body>
                    <Modal.Footer>
                        <Button variant="secondary" onClick={handleClose}>
                            Close
                        </Button>
                        <Button variant="primary" type="submit">
                            Terima & Membuat Siswa
                        </Button>
                    </Modal.Footer>
                </form>
            </Modal>
        </AuthenticatedLayout>
    );
}
