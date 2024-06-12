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

export default function ShowNilai({
    auth,
    totalHafalan,
    rataNilaiTahfidz,
    rataSabaqsabaqi,
    ratasimaan,
    rataikhtibar,
    sumSimaan,
    sumIkhtibar,
    sumSabaqsabaqi,
    kelasSiswa,
    sabaqsabaqi,
    simaan,
    ikhtibar,
    ikhtibarBulanan,
    ikhtibarSemester,
}) {
    const cariPredikat = (nilai) => {
        if (nilai > 90) {
            return "A";
        } else if (nilai >= 70 && nilai <= 94) {
            return "A-";
        } else {
            return "B";
        }
    };
    const header = (
        <div className="row g-2 align-items-center">
            <div className="col">
                {/* Page pre-title */}
                <div className="page-pretitle">Overview</div>
                <h2 className="page-title">{kelasSiswa.user.name}</h2>
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
    const { proccesing, data, setData, post } = useForm({
        jenis_pencapaian: "",
        kelas_siswa_id: kelasSiswa.id,
        nama_pencapaian: "",
        jumlah_pencapaian: "",
        nilai: "",
    });
    const submit = (e) => {
        e.preventDefault();
        post(route("admin.penilaian.hapalan.store"), {
            onSuccess: (res) => {
                toast.success("Berhasil simpan hapalan siswa");
                setShow(false);
            },
        });
    };
    return (
        <AuthenticatedLayout user={auth.user} header={header}>
            <Head title="Hapalan" />
            <div className="card">
                <div className="card-body d-flex justify-between">
                    <div className="card-title">
                        Hapalan : {kelasSiswa.kelas?.name}
                    </div>
                    <div className="btn-actions gap-2">
                        <button
                            className="btn btn-primary"
                            onClick={() => setShow(true)}
                        >
                            Tambah Hapalan
                        </button>
                        <a
                            href={route(
                                "admin.penilaian.hapalan.export",
                                kelasSiswa.id
                            )}
                            className="btn btn-warning"
                        >
                            Export
                        </a>
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
                                            Jenis Hapalan
                                        </label>
                                        <select
                                            className="form-select"
                                            onChange={(e) =>
                                                setData(
                                                    "jenis_pencapaian",
                                                    e.target.value
                                                )
                                            }
                                        >
                                            <option value="">
                                                Pilih Jenis Hapalan
                                            </option>
                                            <option value="Sabaq-Sabaqi">
                                                Sabaq-Sabaqi (Hafalan
                                                Baru-Hafalan Kemarin)
                                            </option>
                                            <option value="SIMA'AN">
                                                SIMA'AN (JUZ)
                                            </option>
                                            <option value="IKHTIBAR SETIAP JUZ">
                                                IKHTIBAR SETIAP JUZ
                                            </option>
                                            <option value="IKHTIBAR BULANAN">
                                                IKHTIBAR BULANAN
                                            </option>
                                            <option value="IKHTIBAR SEMESTER">
                                                IKHTIBAR SEMESTER
                                            </option>
                                        </select>
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            htmlFor=""
                                            className="form-label required"
                                        >
                                            Nama Pencapaian
                                        </label>
                                        <input
                                            type="text"
                                            onChange={(e) =>
                                                setData(
                                                    "nama_pencapaian",
                                                    e.target.value
                                                )
                                            }
                                            className="form-control"
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            htmlFor=""
                                            className="form-label required"
                                        >
                                            Jumlah Pencapaian
                                        </label>
                                        <input
                                            type="number"
                                            onChange={(e) =>
                                                setData(
                                                    "jumlah_pencapaian",
                                                    e.target.value
                                                )
                                            }
                                            className="form-control"
                                        />
                                    </div>
                                    <div className="mb-3">
                                        <label
                                            htmlFor=""
                                            className="form-label required"
                                        >
                                            Nilai Pencapaian
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
                            <th>Pencapaian</th>
                            <th>Jumlah Pencapaian</th>
                            <th>Angka</th>
                            <th>Predikat</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colSpan={4} className="fw-bold">
                                Sabaq-Sabaqi (Hafalan Baru-Hafalan Kemarin)
                            </td>
                        </tr>
                        {sabaqsabaqi.map((data) => {
                            return (
                                <tr key={data.id}>
                                    <td>{data.pencapaian}</td>
                                    <td>{data.jumlah_pencapaian}Halaman.</td>
                                    <td>{data.nilai}</td>
                                    <td>{cariPredikat(data.nilai)}</td>
                                    <td>
                                        <Link
                                            method="delete"
                                            href={route(
                                                "admin.penilaian.hapalan.destroySabaqsabaqi",
                                                data.id
                                            )}
                                            as="button"
                                        >
                                            <IconTrash className="icon" />
                                        </Link>
                                    </td>
                                </tr>
                            );
                        })}
                        <tr>
                            <td>Total</td>
                            <td>{sumSabaqsabaqi}Halaman.</td>
                            <td>{rataSabaqsabaqi}</td>
                            <td>{cariPredikat(rataSabaqsabaqi)}</td>
                        </tr>
                        <tr>
                            <td colSpan={4} className="fw-bold">
                                SIMA'AN (JUZ) :
                            </td>
                        </tr>
                        {simaan.map((data) => {
                            return (
                                <tr key={data.id}>
                                    <td>{data.pencapaian}</td>
                                    <td>{data.jumlah_pencapaian}Halaman.</td>
                                    <td>{data.nilai}</td>
                                    <td>{cariPredikat(data.nilai)}</td>
                                    <td>
                                        <Link
                                            method="delete"
                                            href={route(
                                                "admin.penilaian.hapalan.destroySimaan",
                                                data.id
                                            )}
                                            as="button"
                                        >
                                            <IconTrash className="icon" />
                                        </Link>
                                    </td>
                                </tr>
                            );
                        })}
                        <tr>
                            <td>Total</td>
                            <td>{sumSimaan}Halaman.</td>
                            <td>{ratasimaan}</td>
                            <td>{cariPredikat(ratasimaan)}</td>
                        </tr>
                        <tr>
                            <td colSpan={4} className="fw-bold">
                                IKHTIBAR SETIAP JUZ
                            </td>
                        </tr>
                        {ikhtibar.map((data) => {
                            return (
                                <tr key={data.id}>
                                    <td>{data.pencapaian}</td>
                                    <td>{data.jumlah_pencapaian}Halaman.</td>
                                    <td>{data.nilai}</td>
                                    <td>{cariPredikat(data.nilai)}</td>
                                    <td>
                                        <Link
                                            method="delete"
                                            href={route(
                                                "admin.penilaian.hapalan.destroyIkhtibar",
                                                data.id
                                            )}
                                            as="button"
                                        >
                                            <IconTrash className="icon" />
                                        </Link>
                                    </td>
                                </tr>
                            );
                        })}
                        <tr>
                            <td>Total</td>
                            <td>{sumIkhtibar}Halaman.</td>
                            <td>{rataikhtibar}</td>
                            <td>{cariPredikat(rataikhtibar)}</td>
                        </tr>
                        {ikhtibarBulanan.map((data) => {
                            return (
                                <tr key={data.id}>
                                    <td className="fw-bold">
                                        {data.pencapaian}
                                    </td>
                                    <td>{data.jumlah_pencapaian}Halaman.</td>
                                    <td>{data.nilai}</td>
                                    <td>{cariPredikat(data.nilai)}</td>
                                    <td>
                                        <Link
                                            method="delete"
                                            href={route(
                                                "admin.penilaian.hapalan.destroyIkhtibarBulanan",
                                                data.id
                                            )}
                                            as="button"
                                        >
                                            <IconTrash className="icon" />
                                        </Link>
                                    </td>
                                </tr>
                            );
                        })}
                        {ikhtibarSemester.map((data) => {
                            return (
                                <tr key={data.id}>
                                    <td>{data.pencapaian}</td>
                                    <td>{data.jumlah_pencapaian}Halaman.</td>
                                    <td>{data.nilai}</td>
                                    <td>{cariPredikat(data.nilai)}</td>
                                    <td>
                                        <Link
                                            method="delete"
                                            href={route(
                                                "admin.penilaian.hapalan.destroyIkhtibarSemester",
                                                data.id
                                            )}
                                            as="button"
                                        >
                                            <IconTrash className="icon" />
                                        </Link>
                                    </td>
                                </tr>
                            );
                        })}
                        <tr>
                            <td className="fw-bold" colSpan={2}>
                                TOTAL NILAI TAHFIDZ
                            </td>
                            <td className="fw-bold">{rataNilaiTahfidz}</td>
                            <td className="fw-bold">
                                {cariPredikat(rataNilaiTahfidz)}
                            </td>
                        </tr>
                        <tr>
                            <td className="fw-bold" colSpan={2}>
                                TOTAL HAFALAN KESELURUHAN
                            </td>
                            <td className="fw-bold">{totalHafalan}Halaman.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </AuthenticatedLayout>
    );
}
