<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Modul 18</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --sidebar: #111827;
            --sidebar-hover: #1f2937;
            --accent: #14b8a6;
            --page-bg: #f3f6fb;
            --text: #172033;
        }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            background: var(--page-bg);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            position: sticky;
            top: 0;
            padding: 24px 16px;
            background: var(--sidebar);
            color: #fff;
        }

        .sidebar h2 {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 6px;
        }

        .sidebar .role {
            color: #9ca3af;
            font-size: 13px;
            margin-bottom: 24px;
        }

        .sidebar a {
            display: block;
            padding: 12px 14px;
            margin-bottom: 8px;
            border-radius: 8px;
            color: #e5e7eb;
            text-decoration: none;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background: var(--accent);
            color: #042f2e;
        }

        .main {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 16px;
            padding: 16px 24px;
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
        }

        .content {
            flex: 1;
            padding: 24px;
        }

        .footer {
            padding: 14px 24px;
            background: #fff;
            border-top: 1px solid #e5e7eb;
            color: #64748b;
            text-align: center;
        }

        .page-card {
            background: #fff;
            border: 0;
            border-radius: 16px;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
        }

        .thumb {
            width: 96px;
            height: 64px;
            object-fit: cover;
            border-radius: 8px;
            background: #e5e7eb;
        }

        .hero-img {
            width: 100%;
            max-height: 420px;
            object-fit: cover;
            border-radius: 16px;
            background: #e5e7eb;
        }

        .stat-card {
            border: 0;
            border-radius: 14px;
            background: #fff;
            box-shadow: 0 10px 24px rgba(15, 23, 42, 0.07);
        }

        @media (max-width: 768px) {
            body {
                display: block;
            }

            .sidebar {
                width: 100%;
                min-height: auto;
                position: static;
            }

            .content {
                padding: 16px;
            }
        }
    </style>
</head>
<body>
