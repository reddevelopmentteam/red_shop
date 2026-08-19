<style>
    .welcome-card {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 2rem;
        overflow: hidden;
        min-height: 12.5rem;
        padding: 2rem 2.25rem;
        border: 1px         ;
        border-radius: 1.25rem;
        background:
            linear-gradient(115deg, #1b1012 0%, #55100d 57%, #a90c11 100%);
        color: #fff;
        box-shadow: 0 20px 48px rgb(91 16 10 / 22%);
    }

    .welcome-content { position: relative; z-index: 1; }

    .welcome-glow { position: absolute; border-radius: 999px; pointer-events: none; }
    .welcome-glow-one { width: 19rem; height: 19rem; right: 9rem; bottom: -15rem; background: rgb(255 255 255 / 10%); filter: blur(2px); }

    .welcome-eyebrow {
        color: #f5a49e;     
        font-size: .68rem;
        font-weight: 800;
        letter-spacing: .14em;
    }

    .welcome-eyebrow span { display: inline-block; width: .45rem; height: .45rem; margin-right: .3rem; border-radius: 999px; background: #ffb4aa; box-shadow: 0 0 0 .25rem rgb(255 180 170 / 14%); }

    .welcome-copy h2 {
        margin: .5rem 0;
        font-size: clamp(2rem, 4vw, 2.75rem);
        font-weight: 800;
        letter-spacing: -.035em;
    }

    .welcome-copy p {
        max-width: 39rem;
        margin: 0;
        color: rgb(255 255 255 / 70%);
    }

    .welcome-status { display: flex; align-items: center; gap: .75rem; margin-top: 1.5rem; color: rgb(255 255 255 / 70%); font-size: .75rem; }
    .welcome-status strong { display: block; max-width: 18rem; overflow: hidden; color: #fff; font-size: .875rem; font-weight: 650; text-overflow: ellipsis; white-space: nowrap; }
    .welcome-status-icon { display: grid; width: 2rem; height: 2rem; place-items: center; border-radius: .65rem; background: rgb(255 255 255 / 13%); color: #fff; font-size: 1.1rem; }

    .welcome-mark {
        display: grid;
        flex: 0 0 auto;
        position: relative;
        z-index: 1;
        width: 5.75rem;
        height: 5.75rem;
        place-items: center;
        border: 1px solid rgb(255 255 255 / 18%);
        border-radius: 1.25rem;
        background: rgb(255 255 255 / 9%);
        box-shadow: inset 0 1px 0 rgb(255 255 255 / 14%);
    }

    .welcome-mark img {
        width: 3.5rem;
        height: 3.5rem;
        filter: brightness(0) invert(1);
    }

    .dashboard-overview, .dashboard-shortcuts { margin-top: 1.5rem; }
    .dashboard-overview { padding: 1.4rem 1.5rem 1.5rem; border: 1px solid #ebe5e5; border-radius: 1.1rem; background: #fff; box-shadow: 0 8px 24px rgb(28 25 23 / 4%); }
    .dashboard-overview-heading, .dashboard-shortcuts-heading { display: flex; align-items: end; justify-content: space-between; gap: 1rem; }
    .section-kicker { display: block; color: #b91c1c; font-size: .75rem; font-weight: 800; letter-spacing: .12em; }
    .dashboard-overview h3, .dashboard-shortcuts h3 { margin: .25rem 0 0; color: #251b1b; font-size: 1.05rem; font-weight: 750; letter-spacing: -.015em; }
    .overview-date { color: #8a7f7f; font-size: .75rem; }
    .overview-metrics { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px; margin-top: 1.35rem; overflow: hidden; border-radius: .8rem; background: #eee8e8; }
    .overview-metric { padding: 1rem 1.1rem; background: #fdfcfc; }
    .overview-metric span { display: block; color: #8a7f7f; font-size: .75rem; }
    .overview-metric strong { display: block; margin-top: .35rem; color: #251b1b; font-size: 1.55rem; font-weight: 800; letter-spacing: -.04em; }
    .dashboard-shortcuts { padding: .25rem 0; }
    .shortcut-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: .85rem; margin-top: 1rem; }
    .shortcut-card { display: flex; align-items: center; justify-content: space-between; gap: .75rem; min-height: 6.4rem; padding: 1rem; border: 1px solid #ebe5e5; border-radius: 1rem; background: #fff; color: #251b1b; box-shadow: 0 4px 14px rgb(28 25 23 / 3%); transition: transform .18s ease, box-shadow .18s ease, border-color .18s ease; }
    .shortcut-card:hover { transform: translateY(-3px); border-color: #e5b8b8; box-shadow: 0 12px 22px rgb(126 22 22 / 10%); }
    .shortcut-card strong, .shortcut-card span { display: block; }
    .shortcut-card strong { font-size: .875rem; font-weight: 750; }
    .shortcut-card div > span { margin-top: .25rem; color: #8a7f7f; font-size: .7rem; line-height: 1.35; }
    .shortcut-arrow { display: grid !important; flex: 0 0 auto; width: 1.8rem; height: 1.8rem; place-items: center; border-radius: 999px; background: #f9eeee; color: #b91c1c; font-size: 1rem; transition: transform .18s ease; }
    .shortcut-card:hover .shortcut-arrow { transform: translateX(2px); }
    .shortcut-card-primary { border-color: #bd1c27; background: linear-gradient(135deg, #b80e1d, #d61c2b); color: #fff; }
    .shortcut-card-primary div > span { color: rgb(255 255 255 / 72%); }
    .shortcut-card-primary .shortcut-arrow { background: rgb(255 255 255 / 16%); color: #fff; }
    .shortcut-card-dark { background: #24191a; border-color: #24191a; color: #fff; }
    .shortcut-card-dark div > span { color: rgb(255 255 255 / 60%); }
    .shortcut-card-dark .shortcut-arrow { background: rgb(255 255 255 / 12%); color: #fff; }

    .fi-wi-stats-overview-stat { border: 1px solid #ebe5e5; border-radius: 1rem; background: #fff; box-shadow: 0 8px 20px rgb(28 25 23 / 4%); transition: transform .18s ease, box-shadow .18s ease; }
    .fi-wi-stats-overview-stat:hover { transform: translateY(-2px); box-shadow: 0 12px 24px rgb(28 25 23 / 8%); }
    .dark .dashboard-overview, .dark .shortcut-card-light, .dark .fi-wi-stats-overview-stat { border-color: rgb(255 255 255 / 9%); background: #1d1c20; }
    .dark .dashboard-overview h3, .dark .dashboard-shortcuts h3, .dark .overview-metric strong { color: #fff; }
    .dark .overview-metrics { background: rgb(255 255 255 / 8%); }
    .dark .overview-metric { background: #222126; }
    .dark .overview-date, .dark .overview-metric span, .dark .shortcut-card div > span { color: #f9eeee; }
    .dark .shortcut-card-light { background: #1d1c20; color: #fff; }
    .dark .shortcut-card-dark { background: #55100d; color: #fff; }
    .dark .shortcut-card-light .shortcut-arrow { background: #b80e1d; color: #fff; }
    .dark .shortcut-card-primary .shortcut-arrow { background: #fff; color: #b80e1d; }
    .dark .shortcut-card-dark .shortcut-arrow { background: #fff; color: #55100d; }
    .dark .section-kicker { color: #d61c2b ; }

    .fi-simple-header > .fi-logo {
        height: 7rem !important;
    }

    .fi-sidebar-header {
        padding-top: 2rem;
        padding-bottom: 0.5rem;
    }

    .fi-topbar {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .fi-simple-main {
        margin: 16px;
    }

    @media (max-width: 700px) {
        .welcome-card { align-items: flex-start; flex-direction: column; padding: 1.5rem; }
        .welcome-mark { position: absolute; right: 1.25rem; top: 1.25rem; width: 4rem; height: 4rem; }
        .welcome-mark img { width: 2.4rem; height: 2.4rem; }
        .welcome-copy { padding-right: 3.5rem; }
        .overview-metrics, .shortcut-grid { grid-template-columns: repeat(2, 1fr); }
        .dashboard-overview-heading { align-items: flex-start; flex-direction: column; }
    }
</style>
