<?php

class Cart
{
    public $db = null;

    public function __construct(\Database\DBConnector &$db)
    {
        if (!isset($db->conn)) return null;
        $this->db = $db;
    }

    // Insert into cart table using prepared statements to avoid SQL injection
    public function insertIntoCart($params = null, $table = "cart"): bool
    {
        if ($this->db->conn != null && $params != null) {
            // Get table columns and prepare values
            $columns = implode(',', array_keys($params));
            $placeholders = rtrim(str_repeat('?,', count($params)), ',');
            $values = array_values($params);

            // Create SQL query using placeholders
            $query_string = sprintf("INSERT INTO %s (%s) VALUES (%s)", $table, $columns, $placeholders);

            // Prepare and execute statement
            $stmt = $this->db->conn->prepare($query_string);
            return $stmt->execute($values); // Return the result of execution
        }
        return false;
    }

    // Add to cart using user_id and item_id
    public function addToCart($userid, $itemid)
    {
        if (isset($userid) && isset($itemid)) {
            $params = [
                "user_id" => $userid,
                "item_id" => $itemid
            ];

            // Insert data into cart and reload page on success
            if ($this->insertIntoCart($params)) {
                header("Location: " . $_SERVER['PHP_SELF']);
                exit; // Make sure to exit after redirect
            }
        }
        return false;
    }

    // Delete cart item using item_id and prepared statement
    public function deleteCart($item_id = null, $table = 'cart')
    {
        if ($item_id != null) {
            $stmt = $this->db->conn->prepare("DELETE FROM {$table} WHERE item_id = ?");
            if ($stmt->execute([$item_id])) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                header("Location: " . $_SERVER['PHP_SELF']);
                $stmt->close();

                exit; // Make sure to exit after redirect
            }
            return false;
        }
        return false;
    }

    // Calculate subtotal
    public function getSum($arr)
    {
        if (isset($arr)) {
            $sum = 0;
            foreach ($arr as $item) {
                $sum += floatval($item[0]);
            }
            return sprintf('%.2f', $sum);
        }
        return 0.00; // Return 0 if no items are present
    }

    // Get item_id of shopping cart list
    public function getCartId($cartArray = null, $key = "item_id"): array
    {
        if ($cartArray != null) {
            return array_map(function ($value) use ($key) {
                return $value[$key];
            }, $cartArray);
        }
        return []; // Return empty array if no cartArray
    }

    // Save for later with multi-query protection using prepared statements
    public function saveForLater($item_id = null, $saveTable = "wishlist", $fromTable = "cart")
    {
        if ($item_id != null) {
            // First, insert the item into the wishlist table
            $insertQuery = "INSERT INTO {$saveTable} SELECT * FROM {$fromTable} WHERE item_id = ?";
            $stmtInsert = $this->db->conn->prepare($insertQuery);
            if ($stmtInsert->execute([$item_id])) {
                // If insert succeeds, delete the item from the cart
                $deleteQuery = "DELETE FROM {$fromTable} WHERE item_id = ?";
                $stmtDelete = $this->db->conn->prepare($deleteQuery);
                if ($stmtDelete->execute([$item_id])) {
                    header("Location: " . $_SERVER['PHP_SELF']);
                    exit; // Make sure to exit after redirect
                }
            }
            return false;
        }
        return false;
    }
}
