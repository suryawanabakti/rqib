import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import {
    IconBook2,
    IconEdit,
    IconList,
    IconPencil,
    IconTrash,
    IconUsers,
} from "@tabler/icons-react";
import { useState } from "react";
import { Button, Modal } from "react-bootstrap";
import toast from "react-hot-toast";

export default function Show({ auth, user }) {
    const header = (
        <div className="row g-2 align-items-center">
            <div className="col">
                {/* Page pre-title */}
                <div className="page-pretitle">Overview</div>
                <h2 className="page-title">{user.name}</h2>
            </div>
            {/* Page title actions */}
            <div className="col-auto ms-auto d-print-none">
                <div className="btn-list">
                    <Link
                        href={route("admin.penilaian.index")}
                        className="btn btn-primary"
                    >
                        Kembali
                    </Link>
                </div>
            </div>
        </div>
    );
    const [show, setShow] = useState(false);
    const { proccesing, data, setData, post } = useForm({});
    const submit = (e) => {
        e.preventDefault();
        post(route("admin.penilaian.store"), {
            onSuccess: (re) => {
                toast.success("Berhasil nilai siswa");
                setShow(false);
            },
        });
    };
    return (
        <AuthenticatedLayout user={auth.user} header={header}>
            <Head title="Dashboard" />
            <div className="card">
                <div className="card-body d-flex justify-between">
                    <div className="card-title">
                        Daftar Mata Kuliah & Nilai Kelas :{" "}
                    </div>
                    <div className="btn-actions">
                        <button
                            className="btn btn-primary"
                            onClick={() => setShow(true)}
                        >
                            Tambah Hapalan
                        </button>
                        <Modal show={show} onHide={() => setShow(false)}>
                            <Modal.Header closeButton>
                                <Modal.Title>
                                    Tambah Mata Kuliah dan nilai Siswa
                                </Modal.Title>
                            </Modal.Header>
                            <form onSubmit={submit}>
                                <Modal.Body>
                                    <div className="mb-3">
                                        <label
                                            htmlFor=""
                                            className="form-label required"
                                        >
                                            Mata Pelajaran
                                        </label>
                                        <select
                                            name=""
                                            id=""
                                            className="form-select"
                                            onChange={(e) =>
                                                setData(
                                                    "matakuliah_id",
                                                    e.target.value
                                                )
                                            }
                                        >
                                            <option value="">
                                                Pilih Mata Pelajaran
                                            </option>
                                        </select>
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            htmlFor=""
                                            className="form-label required"
                                        >
                                            Nilai
                                        </label>
                                        <input
                                            type="number"
                                            onChange={(e) =>
                                                setData("nilai", e.target.value)
                                            }
                                            className="form-control"
                                        />
                                    </div>
                                </Modal.Body>
                                <Modal.Footer>
                                    <Button
                                        variant="secondary"
                                        onClick={() => setShow(false)}
                                    >
                                        Close
                                    </Button>
                                    <Button
                                        variant="primary"
                                        type="submit"
                                        disabled={proccesing}
                                    >
                                        Save Changes
                                    </Button>
                                </Modal.Footer>
                            </form>
                        </Modal>
                    </div>
                </div>
                <table className="table card-table">
                    <thead>
                        <tr>
                            <th>Mata Kuliah</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </AuthenticatedLayout>
    );
}
