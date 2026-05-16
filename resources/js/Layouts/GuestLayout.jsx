const navStyle = {
    textDecoration: "none",
    color: "#3a3a3a",
    fontWeight: "500",
};

export default function Guest({ children }) {
    return (
        <div>
            <nav
                style={{
                    width: "100%",
                    padding: "24px 60px",
                    display: "flex",
                    justifyContent: "space-between",
                    alignItems: "center",
                    background: "linear-gradient(135deg,#ffe4ec,#f4dbe2,#dbeaf1)",
                    backdropFilter: "blur(10px)",
                    boxShadow: "0 10px 35px rgba(212,111,141,0.10)",
                    borderBottom: "1px solid rgba(212,111,141,0.18)",
                    position: "fixed",
                    top: 0,
                    left: 0,
                    zIndex: 100,
                    boxSizing: "border-box",
                }}
            >
                <div
                    style={{
                        display: "flex",
                        alignItems: "center",
                        fontSize: "30px",
                        fontWeight: "800",
                        color: "#d46f8d",
                        letterSpacing: "-1px",
                    }}
                >
                    <img
                        src="/images/logo.png"
                        alt="LootMarket Logo"
                        style={{
                            width: "50px",
                            height: "50px",
                            borderRadius: "14px",
                            marginRight: "12px",
                        }}
                    />

                    <span>LootMarket</span>
                </div>

                <div
                    style={{
                        display: "flex",
                        gap: "24px",
                    }}
                >
                    <a href="/products" style={navStyle}>Products</a>
                    <a href="/cart" style={navStyle}>Cart</a>
                    <a href="/login" style={navStyle}>Login</a>
                    <a href="/register" style={navStyle}>Register</a>
                </div>
            </nav>

            <main
                className="min-h-screen flex flex-col items-center justify-center p-6"
                style={{
                    background: "linear-gradient(135deg,#f8f5f2,#f1e7e8,#dde7ee)",
                    paddingTop: "140px",
                }}
            >
                <div className="mb-8 text-center">
                    <h1
                        style={{
                            fontSize: "52px",
                            fontWeight: "800",
                            color: "#c89fa3",
                            letterSpacing: "-2px",
                        }}
                    >
                        LootMarket
                    </h1>

                    <p
                        style={{
                            color: "#6b7280",
                            marginTop: "10px",
                            fontSize: "16px",
                        }}
                    >
                        Soft Gaming Marketplace
                    </p>
                </div>

                <div
                    className="w-full max-w-md"
                    style={{
                        background: "rgba(255,255,255,0.88)",
                        borderRadius: "32px",
                        padding: "40px",
                        boxShadow: "0 20px 50px rgba(0,0,0,0.08)",
                        border: "1px solid rgba(216,180,182,0.35)",
                        backdropFilter: "blur(12px)",
                    }}
                >
                    {children}
                </div>
            </main>
        </div>
    );
}
