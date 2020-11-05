<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/firestore/v1/firestore.proto

namespace Google\Cloud\Firestore\V1\Target;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A target specified by a query.
 *
 * Generated from protobuf message <code>google.firestore.v1.Target.QueryTarget</code>
 */
class QueryTarget extends \Google\Protobuf\Internal\Message
{
    /**
     * The parent resource name. In the format:
     * `projects/{project_id}/databases/{database_id}/documents` or
     * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     * For example:
     * `projects/my-project/databases/my-database/documents` or
     * `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
     *
     * Generated from protobuf field <code>string parent = 1;</code>
     */
    private $parent = '';
    protected $query_type;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           The parent resource name. In the format:
     *           `projects/{project_id}/databases/{database_id}/documents` or
     *           `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     *           For example:
     *           `projects/my-project/databases/my-database/documents` or
     *           `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
     *     @type \Google\Cloud\Firestore\V1\StructuredQuery $structured_query
     *           A structured query.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Firestore\V1\Firestore::initOnce();
        parent::__construct($data);
    }

    /**
     * The parent resource name. In the format:
     * `projects/{project_id}/databases/{database_id}/documents` or
     * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     * For example:
     * `projects/my-project/databases/my-database/documents` or
     * `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
     *
     * Generated from protobuf field <code>string parent = 1;</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * The parent resource name. In the format:
     * `projects/{project_id}/databases/{database_id}/documents` or
     * `projects/{project_id}/databases/{database_id}/documents/{document_path}`.
     * For example:
     * `projects/my-project/databases/my-database/documents` or
     * `projects/my-project/databases/my-database/documents/chatrooms/my-chatroom`
     *
     * Generated from protobuf field <code>string parent = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * A structured query.
     *
     * Generated from protobuf field <code>.google.firestore.v1.StructuredQuery structured_query = 2;</code>
     * @return \Google\Cloud\Firestore\V1\StructuredQuery
     */
    public function getStructuredQuery()
    {
        return $this->readOneof(2);
    }

    public function hasStructuredQuery()
    {
        return $this->hasOneof(2);
    }

    /**
     * A structured query.
     *
     * Generated from protobuf field <code>.google.firestore.v1.StructuredQuery structured_query = 2;</code>
     * @param \Google\Cloud\Firestore\V1\StructuredQuery $var
     * @return $this
     */
    public function setStructuredQuery($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Firestore\V1\StructuredQuery::class);
        $this->writeOneof(2, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getQueryType()
    {
        return $this->whichOneof("query_type");
    }

}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(QueryTarget::class, \Google\Cloud\Firestore\V1\Target_QueryTarget::class);
