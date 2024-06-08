import React from "react";
import { Link } from "@inertiajs/react";
import {
    IconBook2,
    IconHome,
    IconList,
    IconNumber,
    IconPencil,
    IconPencilCheck,
    IconPencilCode,
    IconRegistered,
    IconUsers,
    IconWashTumbleDry,
} from "@tabler/icons-react";

export default function NavLinkAdmin() {
    return (
        <ul className="navbar-nav">
            <li
                className={`nav-item ${
                    route().current("dashboard") && "active"
                }`}
            >
                <Link className="nav-link" href={route("dashboard")}>
                    <span className="nav-link-icon d-md-none d-lg-inline-block">
                        <IconHome className="icon" />
                    </span>
                    <span className="nav-link-title">Home</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    route().current("admin.pendaftar*") && "active"
                }`}
            >
                <Link
                    className="nav-link"
                    href={route("admin.pendaftar.index")}
                >
                    <span className="nav-link-icon d-md-none d-lg-inline-block">
                        <IconPencil className="icon" />
                    </span>
                    <span className="nav-link-title">Pendaftar</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    route().current("admin.users*") && "active"
                }`}
            >
                <Link className="nav-link" href={route("admin.users.index")}>
                    <span className="nav-link-icon d-md-none d-lg-inline-block">
                        <IconUsers className="icon" />
                    </span>
                    <span className="nav-link-title">Siswa</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    route().current("admin.kelas.*") && "active"
                }`}
            >
                <Link className="nav-link" href={route("admin.kelas.index")}>
                    <span className="nav-link-icon d-md-none d-lg-inline-block">
                        <IconList className="icon" />
                    </span>
                    <span className="nav-link-title">Kelas</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    route().current("admin.matakuliah*") && "active"
                }`}
            >
                <Link
                    className="nav-link"
                    href={route("admin.matakuliah.index")}
                >
                    <span className="nav-link-icon d-md-none d-lg-inline-block">
                        <IconBook2 className="icon" />
                    </span>
                    <span className="nav-link-title">Mata Pelajaran</span>
                </Link>
            </li>
            <li
                className={`nav-item ${
                    route().current("admin.penilaian*") && "active"
                }`}
            >
                <Link
                    className="nav-link"
                    href={route("admin.penilaian.index")}
                >
                    <span className="nav-link-icon d-md-none d-lg-inline-block">
                        <IconPencilCheck className="icon" />
                    </span>
                    <span className="nav-link-title">Penilaian</span>
                </Link>
            </li>
        </ul>
    );
}
