<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convert Number to Word</title>
    <link rel="stylesheet" href="/src/style/output.css">
    <!--  font Seam Reap -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang:wght@100;300;400;700;900&family=Jost:ital,wght@0,100..900;1,100..900&family=Lexend:wght@100..900&family=Noto+Serif+Khmer:wght@100..900&family=Outfit:wght@100..900&family=Poetsen+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Siemreap&display=swap" rel="stylesheet">


</head>

<body>
    <div class="container">
        <!-- Fixed Sidebar -->
        <div id="sidebar">
            <div class="sidebar-header">
                <div class="search-container">
                    <input type="text" placeholder="Search chats" class="search-input">
                    <svg class="search-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="search-shortcut">Ctrl K</span>
                </div>
            </div>

            <div class="sidebar-content">
                <div class="history-section">
                    <h3>History</h3>
                    <div id="sidebarHistory">
                        <div style="color: #9ca3af; font-size: 14px; padding: 12px;">No history yet</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div id="mainContent">
            <!-- Fixed Header -->
            <div class="main-header">
                <div class="header-content">
                    <button id="toggleSidebar" type="button">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M3 6h18M3 12h18M3 18h18" />
                        </svg>
                    </button>
                    <h1 class="main-title">Number to Word Calculator</h1>
                </div>
            </div>

            <!-- Scrollable Content -->
            <div id="scrollContent" class="scrollable-content">
                <div class="content-wrapper">
                    <!-- Input Section -->
                    <div class="input-section">
                        <div class="form-group">
                            <label for="InputField" class="form-label">Please Input Your Number:</label>
                            <div class="input-container">
                                <input class="number-input" type="number" id="InputField" name="number" placeholder="បញ្ចូលលេខសម្រាប់បំលែង" />
                                <button class="convert-btn" id="btnconvert" type="button">Convert</button>
                            </div>
                            <div id="texterror" class="error-message"></div>
                        </div>
                    </div>

                    <!-- Results Section -->
                    <div class="results-section">
                        <h2 class="results-title">Result:</h2>

                        <div class="result-item">
                            <div class="result-label">English:</div>
                            <div id="english" class="result-value"></div>
                        </div>

                        <div class="result-item">
                            <div class="result-label">Khmer:</div>
                            <div id="khmer" class="result-value"></div>
                        </div>

                        <div class="result-item">
                            <div class="result-label">Dollar:</div>
                            <div id="dollar" class="result-value"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!--  JS -->
<script src="/src/app.js"></script>

</html>