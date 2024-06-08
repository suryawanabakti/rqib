import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, Link, useForm } from "@inertiajs/react";
import {
    IconBook2,
    IconList,
    IconPencil,
    IconUsers,
} from "@tabler/icons-react";
import { useState } from "react";
import { Button, Modal } from "react-bootstrap";
import toast from "react-hot-toast";

export default function Show({ auth, user, kelas, kelasSiswa }) {
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
    const { data, setData, post, proccesing } = useForm({
        kelas_id: "",
        user_id: user.id,
    });
    const submit = (e) => {
        e.preventDefault();
        post(route("admin.kelassiswa.store"), {
            onSuccess: (re) => {
                toast.success("Berhasil tambah kelas siswa");
                setShow(false);
            },
        });
    };
    return (
        <AuthenticatedLayout user={auth.user} header={header}>
            <Head title="Dashboard" />
            <div className="card">
                <div className="card-body d-flex justify-between">
                    <div className="card-title">Daftar Kelas</div>
                    <div className="btn-actions">
                        <button
                            className="btn btn-primary"
                            onClick={() => setShow(true)}
                        >
                            Tambah Kelas Siswa
                        </button>
                        <Modal show={show} onHide={() => setShow(false)}>
                            <Modal.Header closeButton>
                                <Modal.Title>Tambah Kelas Siswa</Modal.Title>
                            </Modal.Header>
                            <form onSubmit={submit}>
                                <Modal.Body>
                                    <div className="mb-3">
                                        <label
                                            htmlFor=""
                                            className="form-label"
                                        >
                                            Kelas
                                        </label>
                                        <select
                                            className="form-select"
                                            onChange={(e) =>
                                                setData(
                                                    "kelas_id",
                                                    e.target.value
                                                )
                                            }
                                        >
                                            <option value="">
                                                Pilih Kelas
                                            </option>
                                            {kelas.map((data) => {
                                                return (
                                                    <option
                                                        key={data.id}
                                                        value={data.id}
                                                    >
                                                        {data.name}
                                                    </option>
                                                );
                                            })}
                                        </select>
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
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {kelasSiswa.map((data) => {
                            return (
                                <tr key={data.id}>
                                    <td>{data.kelas.name}</td>
                                    <td className="d-flex gap-2">
                                        <Link
                                            className="btn btn-info"
                                            href={route(
                                                "admin.kelassiswa.show",
                                                data.id
                                            )}
                                        >
                                            Lihat Nilai
                                        </Link>
                                        <Link
                                            className="btn btn-danger"
                                            method="delete"
                                            href={route(
                                                "admin.kelassiswa.destroy",
                                                data.id
                                            )}
                                            as="button"
                                        >
                                            Hapus kelas
                                        </Link>
                                    </td>
                                </tr>
                            );
                        })}
                    </tbody>
                </table>
            </div>
        </AuthenticatedLayout>
    );
}
